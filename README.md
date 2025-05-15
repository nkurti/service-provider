# Service Provider Directory

A lightweight, scalable, and performance-optimized directory module built with Laravel 10+ and Vue 3. The module simulates a real-world performance-sensitive feature, focused on minimizing TTFB and LCP while maintaining codebase modularity, maintainability, and testability.

---

##  Architectural & Design Decisions

### ✅ Clean API Design
- RESTful endpoints structured via `api.php`, with stateless responses and clear separation from web routes.
- Use of **Eloquent Resources** to decouple domain models from the API layer and reduce over-fetching.

### ✅ Maintainability via Scopes and Separation
- Query logic abstracted via `scopeFilterByCategory` to ensure reusability across controllers and potential service classes.
- Future-ready for extension into multi-scope filtering (`searchByName`, `sortBy`).

### ✅ Frontend Component Architecture
- UI built in **Vue 3 with Composition API**, using scoped, reusable components (`ProviderCard.vue`, `CategoryFilter.vue`, etc.).
- **Vue Router** enables client-side routing with lightweight transitions.

---

##  Performance Optimizations

###  Backend (Laravel)
- **Eager Loading** (`with('category')`) to eliminate N+1 queries and reduce SQL execution time.
- **Pagination (`paginate(8)`)** limits payload size, accelerates response generation and transmission.
- **Custom Resource (`ServiceProviderResource`)** to serialize only required fields, reducing JSON size and parse time.
- **Scoped Querying (`scopeFilterByCategory`)** enables composable and expressive filters with zero redundancy.
- **Category Cache** (`Cache::remember`) reduces unnecessary DB calls for static data (TTL 60min).

### Frontend (Vue 3 + Vite)
- **Deferred JS Modules** via Vite’s native ES module support improves First Input Delay and TTFB.
- **Lazy Loading of Images** with `loading="lazy"` to postpone rendering until visible.
- **Scoped CSS** reduces unused styles in the critical render path.
- **Minimal Reflow Pagination UI** that avoids full DOM rerendering.
- **vue-select integration** for async dropdowns with search, reducing node complexity and interaction latency.

---

## Testing Strategy

- ✅ **Feature Tests**  
  Validating core API endpoints with pagination, filtering, and profile data.

- ✅ **Unit Tests**  
  Covers custom Eloquent scopes such as `filterByCategory`, ensuring isolation and logic correctness.

- ✅ **Test Example:**
```php
$this->getJson('/api/providers?category_id=1')
     ->assertStatus(200)
     ->assertJsonCount(3, 'data');
