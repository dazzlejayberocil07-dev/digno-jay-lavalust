import React, { useState, useEffect } from 'react';
import api from './api';
import { 
  Package, 
  Plus, 
  Search, 
  Edit2, 
  Trash2, 
  LogOut, 
  Lock, 
  User, 
  AlertCircle, 
  CheckCircle2, 
  DollarSign, 
  Boxes, 
  TrendingUp,
  X,
  Loader2,
  ShieldCheck,
  Server,
  Filter,
  Layers
} from 'lucide-react';

export default function App() {
  // Auth state
  const [token, setToken] = useState(() => localStorage.getItem('access_token'));
  const [user, setUser] = useState(() => {
    const saved = localStorage.getItem('user');
    return saved ? JSON.parse(saved) : null;
  });

  // Login form state
  const [loginForm, setLoginForm] = useState({ username: 'admin', password: 'admin123' });
  const [loginLoading, setLoginLoading] = useState(false);
  const [loginError, setLoginError] = useState('');

  // Products state
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(false);
  const [search, setSearch] = useState('');
  const [statusFilter, setStatusFilter] = useState('all'); // 'all' | 'low_stock' | 'in_stock'

  // Modal states
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [editingProduct, setEditingProduct] = useState(null);
  const [formData, setFormData] = useState({
    product_name: '',
    description: '',
    price: '',
    quantity: ''
  });
  const [formSubmitting, setFormSubmitting] = useState(false);
  const [formError, setFormError] = useState('');

  // Delete modal state
  const [deletingProduct, setDeletingProduct] = useState(null);
  const [deleteLoading, setDeleteLoading] = useState(false);

  // Toast state
  const [toast, setToast] = useState(null);

  const showToast = (message, type = 'success') => {
    setToast({ message, type });
    setTimeout(() => setToast(null), 3500);
  };

  // Fetch products when token is available
  useEffect(() => {
    if (token) {
      fetchProducts();
    }
  }, [token]);

  const fetchProducts = async () => {
    setLoading(true);
    try {
      const res = await api.get('/products');
      if (res.data?.success) {
        setProducts(res.data.data);
      }
    } catch (err) {
      console.error('Failed to fetch products:', err);
      showToast('Failed to load products', 'error');
    } finally {
      setLoading(false);
    }
  };

  // Handle Login
  const handleLogin = async (e) => {
    e.preventDefault();
    setLoginError('');
    setLoginLoading(true);

    try {
      const payload = {
        username: loginForm.username.trim(),
        password: loginForm.password.trim(),
      };
      const res = await api.post('/login', payload);
      if (res.data?.success) {
        const { access_token, refresh_token, user: userData } = res.data.data;
        localStorage.setItem('access_token', access_token);
        localStorage.setItem('refresh_token', refresh_token);
        localStorage.setItem('user', JSON.stringify(userData));

        setToken(access_token);
        setUser(userData);
        showToast(`Welcome back, ${userData.username}`);
      }
    } catch (err) {
      setLoginError(err.response?.data?.message || 'Invalid login credentials.');
    } finally {
      setLoginLoading(false);
    }
  };

  // Handle Logout
  const handleLogout = async () => {
    try {
      const refreshToken = localStorage.getItem('refresh_token');
      if (refreshToken) {
        await api.post('/logout', { refresh_token: refreshToken });
      }
    } catch (err) {
      console.warn('Logout warning:', err);
    } finally {
      localStorage.removeItem('access_token');
      localStorage.removeItem('refresh_token');
      localStorage.removeItem('user');
      setToken(null);
      setUser(null);
      setProducts([]);
      showToast('Signed out successfully.');
    }
  };

  // Open Modal for Create or Edit
  const openModal = (product = null) => {
    setFormError('');
    if (product) {
      setEditingProduct(product);
      setFormData({
        product_name: product.product_name,
        description: product.description || '',
        price: product.price,
        quantity: product.quantity
      });
    } else {
      setEditingProduct(null);
      setFormData({
        product_name: '',
        description: '',
        price: '',
        quantity: ''
      });
    }
    setIsModalOpen(true);
  };

  // Handle Product Form Submit (Create or Edit)
  const handleFormSubmit = async (e) => {
    e.preventDefault();
    setFormError('');

    if (!formData.product_name || !formData.price || formData.quantity === '') {
      setFormError('Please fill in all required fields.');
      return;
    }

    setFormSubmitting(true);
    try {
      if (editingProduct) {
        const res = await api.put(`/products/${editingProduct.id}`, formData);
        if (res.data?.success) {
          showToast('Product updated');
          fetchProducts();
          setIsModalOpen(false);
        }
      } else {
        const res = await api.post('/products', formData);
        if (res.data?.success) {
          showToast('Product created');
          fetchProducts();
          setIsModalOpen(false);
        }
      }
    } catch (err) {
      setFormError(err.response?.data?.message || 'Failed to save product.');
    } finally {
      setFormSubmitting(false);
    }
  };

  // Handle Delete Product
  const handleDelete = async () => {
    if (!deletingProduct) return;
    setDeleteLoading(true);

    try {
      const res = await api.delete(`/products/${deletingProduct.id}`);
      if (res.data?.success) {
        showToast('Product removed');
        setProducts(prev => prev.filter(p => p.id !== deletingProduct.id));
        setDeletingProduct(null);
      }
    } catch (err) {
      showToast(err.response?.data?.message || 'Failed to delete product', 'error');
    } finally {
      setDeleteLoading(false);
    }
  };

  // Filtered Products
  const filteredProducts = products.filter(p => {
    const matchesSearch = p.product_name.toLowerCase().includes(search.toLowerCase()) ||
      (p.description && p.description.toLowerCase().includes(search.toLowerCase()));
    
    const qty = parseInt(p.quantity);
    if (statusFilter === 'low_stock') return matchesSearch && qty <= 5;
    if (statusFilter === 'in_stock') return matchesSearch && qty > 5;
    return matchesSearch;
  });

  // Compute Stats
  const totalItems = products.length;
  const totalValue = products.reduce((sum, p) => sum + (parseFloat(p.price) * parseInt(p.quantity)), 0);
  const lowStock = products.filter(p => parseInt(p.quantity) <= 5).length;

  // -------------------------------------------------------------
  // Render Login View if not logged in
  // -------------------------------------------------------------
  if (!token) {
    return (
      <div style={{ minHeight: '100vh', display: 'flex', alignItems: 'center', justifyContent: 'center', padding: '24px' }}>
        {/* Toast */}
        {toast && (
          <div style={{
            position: 'fixed', top: 20, right: 20, zIndex: 999,
            background: 'var(--bg-card)', border: '1px solid var(--border-subtle)',
            color: '#fff', padding: '10px 16px', borderRadius: '8px',
            boxShadow: 'var(--shadow-md)', display: 'flex', alignItems: 'center', gap: '8px', fontSize: '0.88rem'
          }}>
            {toast.type === 'error' ? <AlertCircle size={16} color="#f87171" /> : <CheckCircle2 size={16} color="#cbd5e1" />}
            <span>{toast.message}</span>
          </div>
        )}

        <div className="panel-card" style={{ width: '100%', maxWidth: '380px', padding: '36px 32px' }}>
          <div style={{ marginBottom: '28px' }}>
            <div style={{
              width: '40px', height: '40px', borderRadius: '8px',
              background: 'rgba(255, 255, 255, 0.06)', border: '1px solid var(--border-subtle)',
              display: 'inline-flex', alignItems: 'center', justifyContent: 'center',
              marginBottom: '16px', color: '#f8fafc'
            }}>
              <Package size={20} />
            </div>
            <h1 style={{ fontFamily: 'var(--font-heading)', fontSize: '1.4rem', fontWeight: 700, color: '#f8fafc', tracking: '-0.02em' }}>
              Product Management
            </h1>
            <p style={{ color: 'var(--text-muted)', fontSize: '0.85rem', marginTop: '4px' }}>
              Sign in to access inventory & API operations
            </p>
          </div>

          {loginError && (
            <div style={{
              background: 'rgba(239, 68, 68, 0.08)', border: '1px solid rgba(239, 68, 68, 0.2)',
              color: '#f87171', padding: '10px 14px', borderRadius: '8px', fontSize: '0.85rem',
              display: 'flex', alignItems: 'center', gap: '8px', marginBottom: '20px'
            }}>
              <AlertCircle size={16} style={{ flexShrink: 0 }} />
              <span>{loginError}</span>
            </div>
          )}

          <form onSubmit={handleLogin} style={{ display: 'flex', flexDirection: 'column', gap: '16px' }}>
            <div>
              <label style={{ display: 'block', fontSize: '0.8rem', fontWeight: 600, color: 'var(--text-muted)', marginBottom: '6px' }}>
                Username
              </label>
              <div style={{ position: 'relative' }}>
                <User size={16} style={{ position: 'absolute', left: 12, top: '50%', transform: 'translateY(-50%)', color: 'var(--text-dim)' }} />
                <input
                  type="text"
                  required
                  className="clean-input"
                  style={{ paddingLeft: '38px' }}
                  placeholder="admin"
                  value={loginForm.username}
                  onChange={(e) => setLoginForm({ ...loginForm, username: e.target.value })}
                />
              </div>
            </div>

            <div>
              <label style={{ display: 'block', fontSize: '0.8rem', fontWeight: 600, color: 'var(--text-muted)', marginBottom: '6px' }}>
                Password
              </label>
              <div style={{ position: 'relative' }}>
                <Lock size={16} style={{ position: 'absolute', left: 12, top: '50%', transform: 'translateY(-50%)', color: 'var(--text-dim)' }} />
                <input
                  type="password"
                  required
                  className="clean-input"
                  style={{ paddingLeft: '38px' }}
                  placeholder="••••••••"
                  value={loginForm.password}
                  onChange={(e) => setLoginForm({ ...loginForm, password: e.target.value })}
                />
              </div>
            </div>

            <button
              type="submit"
              className="btn btn-primary"
              disabled={loginLoading}
              style={{ width: '100%', padding: '10px', marginTop: '6px' }}
            >
              {loginLoading ? <Loader2 size={16} className="animate-spin" /> : 'Sign In'}
            </button>
          </form>

          <div style={{
            marginTop: '20px', paddingTop: '16px', borderTop: '1px solid var(--border-subtle)',
            fontSize: '0.78rem', color: 'var(--text-dim)', display: 'flex', alignItems: 'center', justifyContent: 'space-between'
          }}>
            <span>Default credentials:</span>
            <span style={{ color: 'var(--text-muted)', fontWeight: 600 }}>admin / admin123</span>
          </div>
        </div>
      </div>
    );
  }

  // -------------------------------------------------------------
  // Render Main Dashboard View with 2-Column Sidebar Split Grid
  // -------------------------------------------------------------
  return (
    <div style={{ minHeight: '100vh', display: 'flex', flexDirection: 'column' }}>
      {/* Toast Notification */}
      {toast && (
        <div style={{
          position: 'fixed', top: 20, right: 20, zIndex: 999,
          background: 'var(--bg-card)', border: '1px solid var(--border-subtle)',
          color: '#fff', padding: '10px 16px', borderRadius: '8px',
          boxShadow: 'var(--shadow-md)', display: 'flex', alignItems: 'center', gap: '8px', fontSize: '0.88rem',
          animation: 'fadeIn 0.15s ease-out'
        }}>
          {toast.type === 'error' ? <AlertCircle size={16} color="#f87171" /> : <CheckCircle2 size={16} color="#cbd5e1" />}
          <span>{toast.message}</span>
        </div>
      )}

      {/* Top Header */}
      <header style={{ borderBottom: '1px solid var(--border-subtle)', background: 'var(--bg-secondary)', padding: '12px 24px' }}>
        <div style={{ maxWidth: '1240px', margin: '0 auto', display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
          <div style={{ display: 'flex', alignItems: 'center', gap: '10px' }}>
            <div style={{
              width: '32px', height: '32px', borderRadius: '6px',
              background: 'rgba(255, 255, 255, 0.08)', border: '1px solid var(--border-subtle)',
              display: 'flex', alignItems: 'center', justifyContent: 'center', color: '#fff'
            }}>
              <Package size={18} />
            </div>
            <div>
              <h2 style={{ fontFamily: 'var(--font-heading)', fontSize: '0.98rem', fontWeight: 700, color: '#fff', lineHeight: 1.2 }}>
                LavaLust Store System
              </h2>
            </div>
          </div>

          <div style={{ display: 'flex', alignItems: 'center', gap: '12px' }}>
            <div style={{ display: 'flex', alignItems: 'center', gap: '6px', fontSize: '0.82rem', color: 'var(--text-muted)' }}>
              <ShieldCheck size={15} />
              <span>{user?.username || 'admin'}</span>
            </div>
            <button onClick={handleLogout} className="btn btn-secondary btn-sm" title="Sign Out">
              <LogOut size={14} />
              <span>Sign Out</span>
            </button>
          </div>
        </div>
      </header>

      {/* Main Content Area - 2-Column Split Layout */}
      <main style={{ maxWidth: '1240px', width: '100%', margin: '0 auto', padding: '24px 20px', flex: 1 }}>
        <div style={{ display: 'grid', gridTemplateColumns: 'minmax(260px, 300px) 1fr', gap: '20px', alignItems: 'start' }}>
          
          {/* ======================================================= */}
          {/* LEFT SIDEBAR PANEL: Metric Cards & Primary Actions     */}
          {/* ======================================================= */}
          <aside style={{ display: 'flex', flexDirection: 'column', gap: '16px' }}>
            {/* Primary Action Hero Button */}
            <button
              onClick={() => openModal()}
              className="btn btn-primary"
              style={{ width: '100%', padding: '12px', justifyContent: 'center' }}
            >
              <Plus size={16} />
              <span>Add New Product</span>
            </button>

            {/* Vertical Stacked Metric Cards */}
            <div className="panel-card" style={{ padding: '20px' }}>
              <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '16px' }}>
                <span style={{ fontSize: '0.75rem', fontWeight: 700, textTransform: 'uppercase', letterSpacing: '0.05em', color: 'var(--text-dim)' }}>
                  Inventory Summary
                </span>
                <Boxes size={16} color="var(--text-dim)" />
              </div>

              {/* Metric 1 */}
              <div style={{ paddingBottom: '14px', marginBottom: '14px', borderBottom: '1px solid var(--border-subtle)' }}>
                <div style={{ fontSize: '0.78rem', color: 'var(--text-muted)', marginBottom: '4px' }}>Total Products</div>
                <div style={{ fontFamily: 'var(--font-heading)', fontSize: '1.75rem', fontWeight: 700, color: '#fff', lineHeight: 1.1 }}>
                  {totalItems}
                </div>
              </div>

              {/* Metric 2 */}
              <div style={{ paddingBottom: '14px', marginBottom: '14px', borderBottom: '1px solid var(--border-subtle)' }}>
                <div style={{ fontSize: '0.78rem', color: 'var(--text-muted)', marginBottom: '4px' }}>Total Inventory Valuation</div>
                <div style={{ fontFamily: 'var(--font-heading)', fontSize: '1.5rem', fontWeight: 700, color: '#f8fafc', lineHeight: 1.1 }}>
                  ${totalValue.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}
                </div>
              </div>

              {/* Metric 3 */}
              <div>
                <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '4px' }}>
                  <span style={{ fontSize: '0.78rem', color: 'var(--text-muted)' }}>Low Stock Items</span>
                  {lowStock > 0 && <span className="tag tag-warning">Needs Restock</span>}
                </div>
                <div style={{ fontFamily: 'var(--font-heading)', fontSize: '1.5rem', fontWeight: 700, color: lowStock > 0 ? '#fcd34d' : '#fff', lineHeight: 1.1 }}>
                  {lowStock}
                </div>
              </div>
            </div>

            {/* API Health Widget */}
            <div className="panel-card" style={{ padding: '16px 20px', display: 'flex', alignItems: 'center', gap: '12px' }}>
              <Server size={18} style={{ color: '#34d399', flexShrink: 0 }} />
              <div>
                <div style={{ fontSize: '0.8rem', fontWeight: 600, color: '#fff' }}>LavaLust API</div>
                <div style={{ fontSize: '0.72rem', color: 'var(--text-muted)' }}>Connected & Active</div>
              </div>
            </div>
          </aside>

          {/* ======================================================= */}
          {/* RIGHT MAIN PANEL: Table, Search, and Status Filters   */}
          {/* ======================================================= */}
          <section style={{ display: 'flex', flexDirection: 'column', gap: '16px' }}>
            
            {/* Header Controls: Search & Status Filter Tabs */}
            <div className="panel-card" style={{ padding: '14px 16px', display: 'flex', alignItems: 'center', justifyContent: 'space-between', flexWrap: 'wrap', gap: '12px' }}>
              {/* Search Bar */}
              <div style={{ position: 'relative', flex: '1', minWidth: '200px' }}>
                <Search size={15} style={{ position: 'absolute', left: 12, top: '50%', transform: 'translateY(-50%)', color: 'var(--text-dim)' }} />
                <input
                  type="text"
                  className="clean-input"
                  style={{ paddingLeft: '36px', padding: '8px 12px 8px 36px', fontSize: '0.85rem' }}
                  placeholder="Filter products by name..."
                  value={search}
                  onChange={(e) => setSearch(e.target.value)}
                />
              </div>

              {/* Status Filter Tabs */}
              <div style={{ display: 'flex', gap: '4px', background: 'rgba(0,0,0,0.2)', padding: '3px', borderRadius: '8px', border: '1px solid var(--border-subtle)' }}>
                <button
                  onClick={() => setStatusFilter('all')}
                  className={`btn btn-sm ${statusFilter === 'all' ? 'btn-primary' : 'btn-secondary'}`}
                  style={{ padding: '4px 10px', fontSize: '0.75rem' }}
                >
                  All ({products.length})
                </button>
                <button
                  onClick={() => setStatusFilter('in_stock')}
                  className={`btn btn-sm ${statusFilter === 'in_stock' ? 'btn-primary' : 'btn-secondary'}`}
                  style={{ padding: '4px 10px', fontSize: '0.75rem' }}
                >
                  In Stock
                </button>
                <button
                  onClick={() => setStatusFilter('low_stock')}
                  className={`btn btn-sm ${statusFilter === 'low_stock' ? 'btn-primary' : 'btn-secondary'}`}
                  style={{ padding: '4px 10px', fontSize: '0.75rem' }}
                >
                  Low Stock ({lowStock})
                </button>
              </div>
            </div>

            {/* Main Products Table */}
            <div className="panel-card" style={{ overflow: 'hidden' }}>
              {loading ? (
                <div style={{ padding: '48px', textAlign: 'center', color: 'var(--text-muted)' }}>
                  <Loader2 size={24} className="animate-spin" style={{ margin: '0 auto 8px auto' }} />
                  <div style={{ fontSize: '0.88rem' }}>Loading inventory...</div>
                </div>
              ) : filteredProducts.length === 0 ? (
                <div style={{ padding: '48px 20px', textAlign: 'center', color: 'var(--text-muted)' }}>
                  <Package size={36} style={{ margin: '0 auto 12px auto', opacity: 0.3 }} />
                  <h3 style={{ color: '#fff', fontSize: '1rem', fontWeight: 600, marginBottom: '4px' }}>No products found</h3>
                  <p style={{ fontSize: '0.85rem' }}>{search ? 'No items match your filter.' : 'Click "Add New Product" to create your first entry.'}</p>
                </div>
              ) : (
                <div style={{ overflowX: 'auto' }}>
                  <table className="modern-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Status</th>
                        <th style={{ textAlign: 'right' }}>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      {filteredProducts.map((p) => {
                        const price = parseFloat(p.price);
                        const qty = parseInt(p.quantity);
                        return (
                          <tr key={p.id}>
                            <td style={{ color: 'var(--text-dim)', fontWeight: 500 }}>#{p.id}</td>
                            <td style={{ fontWeight: 600, color: '#f8fafc' }}>{p.product_name}</td>
                            <td style={{ color: 'var(--text-muted)', maxWidth: '240px', whiteSpace: 'nowrap', overflow: 'hidden', textOverflow: 'ellipsis' }}>
                              {p.description || '—'}
                            </td>
                            <td style={{ fontWeight: 600, color: '#f8fafc' }}>
                              ${price.toFixed(2)}
                            </td>
                            <td style={{ fontWeight: 500 }}>{qty}</td>
                            <td>
                              {qty > 10 ? (
                                <span className="tag tag-success">In Stock</span>
                              ) : qty > 0 ? (
                                <span className="tag tag-warning">Low ({qty})</span>
                              ) : (
                                <span className="tag tag-danger">Out of Stock</span>
                              )}
                            </td>
                            <td style={{ textAlign: 'right' }}>
                              <div style={{ display: 'inline-flex', gap: '6px' }}>
                                <button
                                  onClick={() => openModal(p)}
                                  className="btn btn-secondary btn-sm"
                                  title="Edit product"
                                >
                                  <Edit2 size={13} />
                                  <span>Edit</span>
                                </button>
                                <button
                                  onClick={() => setDeletingProduct(p)}
                                  className="btn btn-danger btn-sm"
                                  title="Delete product"
                                >
                                  <Trash2 size={13} />
                                  <span>Delete</span>
                                </button>
                              </div>
                            </td>
                          </tr>
                        );
                      })}
                    </tbody>
                  </table>
                </div>
              )}
            </div>

          </section>
        </div>
      </main>

      {/* Add / Edit Modal */}
      {isModalOpen && (
        <div className="modal-overlay">
          <div className="panel-card modal-content" style={{ padding: '28px' }}>
            <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '20px' }}>
              <h2 style={{ fontFamily: 'var(--font-heading)', fontSize: '1.15rem', fontWeight: 700, color: '#fff' }}>
                {editingProduct ? 'Edit Product' : 'Add Product'}
              </h2>
              <button
                onClick={() => setIsModalOpen(false)}
                style={{ background: 'none', border: 'none', color: 'var(--text-muted)', cursor: 'pointer', padding: '4px' }}
              >
                <X size={18} />
              </button>
            </div>

            {formError && (
              <div style={{
                background: 'rgba(239, 68, 68, 0.08)', border: '1px solid rgba(239, 68, 68, 0.2)',
                color: '#f87171', padding: '10px', borderRadius: '6px', fontSize: '0.82rem',
                display: 'flex', alignItems: 'center', gap: '6px', marginBottom: '16px'
              }}>
                <AlertCircle size={15} />
                <span>{formError}</span>
              </div>
            )}

            <form onSubmit={handleFormSubmit} style={{ display: 'flex', flexDirection: 'column', gap: '14px' }}>
              <div>
                <label style={{ display: 'block', fontSize: '0.8rem', fontWeight: 600, color: 'var(--text-muted)', marginBottom: '5px' }}>
                  Product Name *
                </label>
                <input
                  type="text"
                  required
                  className="clean-input"
                  placeholder="e.g. Ergonomic Keyboard"
                  value={formData.product_name}
                  onChange={(e) => setFormData({ ...formData, product_name: e.target.value })}
                />
              </div>

              <div>
                <label style={{ display: 'block', fontSize: '0.8rem', fontWeight: 600, color: 'var(--text-muted)', marginBottom: '5px' }}>
                  Description
                </label>
                <textarea
                  className="clean-input"
                  rows="3"
                  placeholder="Product details..."
                  value={formData.description}
                  onChange={(e) => setFormData({ ...formData, description: e.target.value })}
                  style={{ resize: 'vertical' }}
                />
              </div>

              <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '12px' }}>
                <div>
                  <label style={{ display: 'block', fontSize: '0.8rem', fontWeight: 600, color: 'var(--text-muted)', marginBottom: '5px' }}>
                    Price ($) *
                  </label>
                  <input
                    type="number"
                    step="0.01"
                    min="0"
                    required
                    className="clean-input"
                    placeholder="49.99"
                    value={formData.price}
                    onChange={(e) => setFormData({ ...formData, price: e.target.value })}
                  />
                </div>

                <div>
                  <label style={{ display: 'block', fontSize: '0.8rem', fontWeight: 600, color: 'var(--text-muted)', marginBottom: '5px' }}>
                    Quantity *
                  </label>
                  <input
                    type="number"
                    min="0"
                    required
                    className="clean-input"
                    placeholder="25"
                    value={formData.quantity}
                    onChange={(e) => setFormData({ ...formData, quantity: e.target.value })}
                  />
                </div>
              </div>

              <div style={{ display: 'flex', justifyContent: 'flex-end', gap: '10px', marginTop: '12px' }}>
                <button
                  type="button"
                  className="btn btn-secondary"
                  onClick={() => setIsModalOpen(false)}
                >
                  Cancel
                </button>
                <button
                  type="submit"
                  className="btn btn-primary"
                  disabled={formSubmitting}
                >
                  {formSubmitting ? <Loader2 size={15} className="animate-spin" /> : (editingProduct ? 'Update' : 'Create')}
                </button>
              </div>
            </form>
          </div>
        </div>
      )}

      {/* Delete Confirmation Modal */}
      {deletingProduct && (
        <div className="modal-overlay">
          <div className="panel-card modal-content" style={{ padding: '24px', maxWidth: '400px' }}>
            <div style={{ textAlign: 'center', marginBottom: '18px' }}>
              <div style={{
                width: '40px', height: '40px', borderRadius: '50%',
                background: 'rgba(239, 68, 68, 0.1)', color: '#f87171',
                display: 'inline-flex', alignItems: 'center', justifyContent: 'center',
                marginBottom: '12px'
              }}>
                <Trash2 size={20} />
              </div>
              <h3 style={{ fontFamily: 'var(--font-heading)', fontSize: '1.1rem', color: '#fff', marginBottom: '6px' }}>
                Delete Product?
              </h3>
              <p style={{ color: 'var(--text-muted)', fontSize: '0.85rem' }}>
                Are you sure you want to delete <strong style={{ color: '#fff' }}>{deletingProduct.product_name}</strong>?
              </p>
            </div>

            <div style={{ display: 'flex', gap: '10px', justifyContent: 'center' }}>
              <button
                className="btn btn-secondary"
                style={{ flex: 1 }}
                onClick={() => setDeletingProduct(null)}
              >
                Cancel
              </button>
              <button
                className="btn btn-danger"
                style={{ flex: 1 }}
                onClick={handleDelete}
                disabled={deleteLoading}
              >
                {deleteLoading ? <Loader2 size={15} className="animate-spin" /> : 'Delete'}
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}
