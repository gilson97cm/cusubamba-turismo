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
        #region NEWS
        Permission::create([
            'name' => 'Navegar Noticias',
            'slug' => 'news.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todas las noticias.',
        ]);
        Permission::create([
            'name' => 'Crear Noticias',
            'slug' => 'news.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Publicar una noticia nueva.',
        ]);
        Permission::create([
            'name' => 'Editar Noticias',
            'slug' => 'news.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar una noticia publicada.',
        ]);
        Permission::create([
            'name' => 'Ver Noticias',
            'slug' => 'news.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver los detalles de una noticia publicada.',
        ]);
        Permission::create([
            'name' => 'Eliminar Noticias',
            'slug' => 'news.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar una noticia publicada.',
        ]);
        #endregion

        #region LEGENDS
        Permission::create([
            'name' => 'Navegar Leyendas',
            'slug' => 'legends.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todas las leyendas.',
        ]);
        Permission::create([
            'name' => 'Crear Leyendas',
            'slug' => 'legends.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Publicar una leyenda nueva.',
        ]);
        Permission::create([
            'name' => 'Editar Leyendas',
            'slug' => 'legends.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar una leyenda publicada.',
        ]);
        Permission::create([
            'name' => 'Ver Leyendas',
            'slug' => 'legends.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver los detalles de una leyenda publicada.',
        ]);
        Permission::create([
            'name' => 'Eliminar Leyendas',
            'slug' => 'legends.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar una leyenda publicada.',
        ]);
        #endregion

        #region CATEGORIES
        #region CATEGORY-ACTIVITIES
        Permission::create([
            'name' => 'Navegar Categoria de Actividades',
            'slug' => 'categoriesA.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos las Categorías de Actividades.',
        ]);
        Permission::create([
            'name' => 'Crear Categoria de Actividades',
            'slug' => 'categoriesA.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Crear una nueva Categorías de Actividades.',
        ]);
        Permission::create([
            'name' => 'Editar Categoria de Actividades',
            'slug' => 'categoriesA.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Edita una Categorías de Actividades existente.',
        ]);
        Permission::create([
            'name' => 'Eliminar Categoria de Actividades',
            'slug' => 'categoriesA.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Elimina una Categorías de Actividades existente.',
        ]);
        #endregion
        #region CATEGORY-EVENTS
        Permission::create([
            'name' => 'Navegar Categoria de Eventos',
            'slug' => 'categoriesE.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos las Categorías de Eventos.',
        ]);
        Permission::create([
            'name' => 'Crear Categoria de Eventos',
            'slug' => 'categoriesE.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Crear una nueva Categorías de Eventos.',
        ]);
        Permission::create([
            'name' => 'Editar Categoria de Eventos',
            'slug' => 'categoriesE.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Edita una Categorías de Eventos existente.',
        ]);
        Permission::create([
            'name' => 'Eliminar Categoria de Eventos',
            'slug' => 'categoriesE.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Elimina una Categorías de Eventos existente.',
        ]);
        #endregion
        #region CATEGORY-PLACES
        Permission::create([
            'name' => 'Navegar Categoria de Lugares',
            'slug' => 'categoriesP.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos las Categorías de Lugares.',
        ]);
        Permission::create([
            'name' => 'Crear Categoria de Lugares',
            'slug' => 'categoriesP.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Crear una nueva Categorías de Lugares.',
        ]);
        Permission::create([
            'name' => 'Editar Categoria de Lugares',
            'slug' => 'categoriesP.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Edita una Categorías de Lugares existente.',
        ]);
        Permission::create([
            'name' => 'Eliminar Categoria de Lugares',
            'slug' => 'categoriesP.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Elimina una Categorías de Lugares existente.',
        ]);
        #endregion
        #endregion

        #region ACTIVITIES
        Permission::create([
            'name' => 'Navegar Actividades',
            'slug' => 'activities.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todas las actividades.',
        ]);
        Permission::create([
            'name' => 'Crear Actividades',
            'slug' => 'activities.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Crear una actividad nueva.',
        ]);
        Permission::create([
            'name' => 'Editar Actividades',
            'slug' => 'activities.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar la información de una actividad existente.',
        ]);
        Permission::create([
            'name' => 'Ver Actividades',
            'slug' => 'activities.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver los detalles de una actividad existente.',
        ]);
        Permission::create([
            'name' => 'Eliminar Actividades',
            'slug' => 'activities.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar una actividad existente.',
        ]);
        #endregion

        #region PLACES
        Permission::create([
            'name' => 'Navegar Lugares',
            'slug' => 'places.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todoss los lugares.',
        ]);
        Permission::create([
            'name' => 'Crear Lugares',
            'slug' => 'places.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Crear un lugar nuevo.',
        ]);
        Permission::create([
            'name' => 'Editar Lugares',
            'slug' => 'places.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar la información de un lugar existente.',
        ]);
        Permission::create([
            'name' => 'Ver Lugares',
            'slug' => 'places.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver los detalles de un lugar existente.',
        ]);
        Permission::create([
            'name' => 'Eliminar Lugares',
            'slug' => 'places.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar un lugar existente.',
        ]);
        #endregion

        #region EVENTS
        Permission::create([
            'name' => 'Navegar Eventos',
            'slug' => 'events.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todoss los eventos.',
        ]);
        Permission::create([
            'name' => 'Crear Eventos',
            'slug' => 'events.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Crear un evento nuevo (Vista del Calendario).',
        ]);
        Permission::create([
            'name' => 'Editar Eventos',
            'slug' => 'events.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar la información de un evento existente.',
        ]);
        Permission::create([
            'name' => 'Ver Eventos',
            'slug' => 'events.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver los detalles de un evento existente.',
        ]);
        Permission::create([
            'name' => 'Eliminar Eventos',
            'slug' => 'events.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar un evento existente.',
        ]);
        #endregion

        #region USERS
        Permission::create([
            'name' => 'Navegar Usuarios',
            'slug' => 'users.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los Usuarios.',
        ]);
        Permission::create([
            'name' => 'Ver detalle de Usuarios',
            'slug' => 'users.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver la información de un Usuario.',
        ]);
        Permission::create([
            'name' => 'Crear Usuarios',
            'slug' => 'users.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Registrar un Usuario nuevo.',
        ]);
        Permission::create([
            'name' => 'Editar Usuarios',
            'slug' => 'users.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar la información de un Usuario existente.',
        ]);
        Permission::create([
            'name' => 'Eliminar Usuarios',
            'slug' => 'users.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Cambiar el estado de un usuario (Activo - Inactivo).',
        ]);
        Permission::create([
            'name' => 'Ver Usuarios inactivos',
            'slug' => 'users.inactive', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver el listado de usuarios inactivos.',
        ]);

        Permission::create([
            'name' => 'Habilitar Usuarios',
            'slug' => 'users.active', //estas rutas deben estar en el archivo de rutas
            'description' => 'Cambiar el estado de un usuario (Inactivo - Activo).',
        ]);
        #endregion

        #region ROLES
        Permission::create([
            'name' => 'Navegar Roles',
            'slug' => 'roles.index', //estas rutas deben estar en el archivo de rutas
            'description' => 'Lista y navega todos los Roles',
        ]);
        Permission::create([
            'name' => 'Ver detalle de Roles',
            'slug' => 'roles.show', //estas rutas deben estar en el archivo de rutas
            'description' => 'Ver los detalles de un Rol',
        ]);
        Permission::create([
            'name' => 'Crear Roles',
            'slug' => 'roles.create', //estas rutas deben estar en el archivo de rutas
            'description' => 'Registrar un nuevo Rol',
        ]);
        Permission::create([
            'name' => 'Editar Roles',
            'slug' => 'roles.edit', //estas rutas deben estar en el archivo de rutas
            'description' => 'Editar la información de un rol.',
        ]);
        Permission::create([
            'name' => 'Eliminar Roles',
            'slug' => 'roles.destroy', //estas rutas deben estar en el archivo de rutas
            'description' => 'Eliminar un Rol existente.',
        ]);
        #endregion

    }
}
