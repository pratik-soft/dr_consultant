<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            //permissions
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'permission-view',

            //roles
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-view',

            //users
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-view',

            //products
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-view',

            //blog
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'blog-view',

            //testimonials
            'testimonial-list',
            'testimonial-create',
            'testimonial-edit',
            'testimonial-delete',
            'testimonial-view',

            //team
            'team-list',
            'team-create',
            'team-edit',
            'team-delete',
            'team-view',

            //tags
            'tags-list',
            'tags-create',
            'tags-edit',
            'tags-delete',
            'tags-view',

            //subscriber
            'subscriber-list',
            'subscriber-create',
            'subscriber-edit',
            'subscriber-delete',            

            //categories
            'categories-list',
            'categories-create',
            'categories-edit',
            'categories-delete',
            'categories-view',

            //client
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',
            'client-view',

            //faq
            'faq-list',
            'faq-create',
            'faq-edit',
            'faq-delete',
            'faq-view',

            //portfolio
            'portfolio-list',
            'portfolio-create',
            'portfolio-edit',
            'portfolio-delete',
            'portfolio-view',

            //position
            'position-list',
            'position-create',
            'position-edit',
            'position-delete',
            'position-view',

            //services
            'services-list',
            'services-create',
            'services-edit',
            'services-delete',
            'services-view',

            //dummies
            'dummies-list',
            'dummies-create',
            'dummies-edit',
            'dummies-delete',
            'dummies-view',

            //inquiry
            'inquiry-list',            
            'inquiry-delete',

            //settings
            'settings',            
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
