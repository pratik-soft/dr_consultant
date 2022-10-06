@if (strpos($value->name, 'blog-') !== false && !in_array('blog-', $rolePrefixes))
    @php ($rolePrefixes[] = 'blog-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Blog</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'categories-') !== false && !in_array('categories-', $rolePrefixes))
    @php ($rolePrefixes[] = 'categories-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Categories</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'client-') !== false && !in_array('client-', $rolePrefixes))
    @php ($rolePrefixes[] = 'client-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Clients</h6>                                            
    </div>
@endif                                    
@if (strpos($value->name, 'faq-') !== false && !in_array('faq-', $rolePrefixes))
    @php ($rolePrefixes[] = 'faq-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>FAQ</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'portfolio-') !== false && !in_array('portfolio-', $rolePrefixes))
    @php ($rolePrefixes[] = 'portfolio-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Portfolio</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'position-') !== false && !in_array('position-', $rolePrefixes))
    @php ($rolePrefixes[] = 'position-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Positions</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'services-') !== false && !in_array('services-', $rolePrefixes))
    @php ($rolePrefixes[] = 'services-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Services</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'subscriber-') !== false && !in_array('subscriber-', $rolePrefixes))
    @php ($rolePrefixes[] = 'subscriber-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Subscribers</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'team-') !== false && !in_array('team-', $rolePrefixes))
    @php ($rolePrefixes[] = 'team-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Team</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'testimonial-') !== false && !in_array('testimonial-', $rolePrefixes))
    @php ($rolePrefixes[] = 'testimonial-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Testimonials</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'tags-') !== false && !in_array('tags-', $rolePrefixes))
    @php ($rolePrefixes[] = 'tags-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Tags</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'settings') !== false && !in_array('settings', $rolePrefixes))
    @php ($rolePrefixes[] = 'settings')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Settings</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'inquiry-') !== false && !in_array('inquiry-', $rolePrefixes))
    @php ($rolePrefixes[] = 'inquiry-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Inquiries</h6>
    </div>
@endif
@if (strpos($value->name, 'product-') !== false && !in_array('product-', $rolePrefixes))
    @php ($rolePrefixes[] = 'product-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Products</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'permission-') !== false && !in_array('permission-', $rolePrefixes))
    @php ($rolePrefixes[] = 'permission-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Permissions</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'role-') !== false && !in_array('role-', $rolePrefixes))
    @php ($rolePrefixes[] = 'role-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Roles</h6>                                            
    </div>
@endif
@if (strpos($value->name, 'user-') !== false && !in_array('user-', $rolePrefixes))
    @php ($rolePrefixes[] = 'user-')
    <div class="col-md-12 text-secondary">
        <hr>
        <h6>Users</h6>                                            
    </div>
@endif