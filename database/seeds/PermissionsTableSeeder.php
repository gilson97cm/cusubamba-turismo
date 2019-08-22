<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #region DEALS
        Permission::create([
            'name' => 'Navegar Negocio',
            'slug' => 'deals.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los negocio del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de Negocio',
            'slug' => 'deals.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver en detalle cada negocio del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Negocio',
            'slug' => 'deals.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar cualquier dato de un negocio del sistema',
        ]);
        Permission::create([
            'name' => 'Editar Negocio',
            'slug' => 'deals.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar cualquier dato de un negocio del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Negocio',
            'slug' => 'deals.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar cualquier dato de un negocio del sistema',
        ]);
        #endregion

        #region EMPLOYEES
        Permission::create([
            'name' => 'Navegar Empleados',
            'slug' => 'employees.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los Empleados del negocio',
        ]);
        Permission::create([
            'name' => 'Ver detalle de Empleado',
            'slug' => 'employees.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver en detalle cada empleado del negocio',
        ]);
        Permission::create([
            'name' => 'Crear Empleado',
            'slug' => 'employees.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Registrar un Empleado nuevo',
        ]);
        Permission::create([
            'name' => 'Editar Empleado',
            'slug' => 'employees.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar cualquier dato de un Empleado del negocio',
        ]);
        Permission::create([
            'name' => 'Eliminar Empleado',
            'slug' => 'employees.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar cualquier Empleado del negocio',
        ]);
        Permission::create([
            'name' => 'Ver Empleados inactivos',
            'slug' => 'employees.inactive', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver el listado de empleados inactivos del Negocio',
        ]);
        #endregion

        #region ROLES
        Permission::create([
            'name' => 'Navegar Roles',
            'slug' => 'roles.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los roles',
        ]);
        Permission::create([
            'name' => 'Ver detalle de Roles',
            'slug' => 'roles.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver en detalle cada rol',
        ]);
        Permission::create([
            'name' => 'Crear Roles',
            'slug' => 'roles.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Registrar un nuevo rol',
        ]);
        Permission::create([
            'name' => 'Editar Roles',
            'slug' => 'roles.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar cualquier dato de un rol',
        ]);
        Permission::create([
            'name' => 'Eliminar Roles',
            'slug' => 'roles.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar cualquier rol',
        ]);
        #endregion

        #region PRODUCTS
        Permission::create([
            'name' => 'Navegar Productos',
            'slug' => 'products.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los producto del negocio',
        ]);
        Permission::create([
            'name' => 'Ver detalle de Productos',
            'slug' => 'products.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver en detalle cada producto del negocio',
        ]);
        Permission::create([
            'name' => 'Crear Productos',
            'slug' => 'products.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Agregar productos al negocio',
        ]);
        Permission::create([
            'name' => 'Editar Productos',
            'slug' => 'products.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar cualquier producto del negocio',
        ]);
        Permission::create([
            'name' => 'Eliminar Productos',
            'slug' => 'products.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar cualquier producto del negocio',
        ]);
        Permission::create([
            'name' => 'Buscar Productos',
            'slug' => 'products.browse', //estas rutas deben estar en el archivo de rutas
            'description' => 'Buscar productos del negocio',
        ]);
        #endregion

        #region CODE_QR
        Permission::create([
            'name' => 'Navegar Códigos QR',
            'slug' => 'codeQR.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los códigos QR del sistema',
        ]);
        //PRODUCTOS INACTIVOS
        Permission::create([
            'name' => 'Ver Lista de Productos Inactivos',
            'slug' => 'products.inactive', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los productos inactivos del negocio',
        ]);
        Permission::create([
            'name' => 'Editar Productos Inactivos',
            'slug' => 'products.inactive.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar los productos inactivos del negocio',
        ]);
        Permission::create([
            'name' => 'Eliminar Productos Inactivos',
            'slug' => 'products.inactive.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar los productos inactivos del negocio',
        ]);
        #endregion

        #region CATEGORY
        Permission::create([
            'name' => 'Navegar Categorias',
            'slug' => 'categories.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos las categrias del sistema',
        ]);
        Permission::create([
            'name' => 'Ver Categoria',
            'slug' => 'categories.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver en detalle cada categoria del sistema',
        ]);
        Permission::create([
            'name' => 'Crear Categoria',
            'slug' => 'categories.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Crear una categoria nueva',
        ]);
        Permission::create([
            'name' => 'Editar Categoria',
            'slug' => 'categories.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar cualquier categoria del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar Categoria',
            'slug' => 'categories.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar cualquier categoria del sistema',
        ]);
        Permission::create([
            'name' => 'Buscar Categoria',
            'slug' => 'categories.browse', //estas rutas deben estar en el archivo de rutas
            'description' => 'Buscar categorias del sistema',
        ]);
        #endregion

        #region ORDERS
        Permission::create([
            'name' => 'Navegar Pedidos',
            'slug' => 'orders.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los pedidos',
        ]);
        Permission::create([
            'name' => 'Ver detalle de Pedidos',
            'slug' => 'orders.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver en detalle cada pedido',
        ]);
        Permission::create([
            'name' => 'Crear Pedidos',
            'slug' => 'orders.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Registrar un nuevo pedido',
        ]);
        Permission::create([
            'name' => 'Editar Pedidos',
            'slug' => 'orders.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar cualquier dato de un pedido',
        ]);
        Permission::create([
            'name' => 'Eliminar Pedidos',
            'slug' => 'orders.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar cualquier pedido',
        ]);
        #endregion
    }
}
