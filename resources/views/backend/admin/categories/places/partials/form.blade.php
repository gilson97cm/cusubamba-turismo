<th>
    {{Form::text('name_place_category', null , [
    'id'=> 'add_category',
    'onkeypress' => 'events',
    'onblur' => 'aMayusculas(this.value,this.id)',
    'class' => 'form-control upletter']) }}
</th>
<th>
    {{Form::text('description_place_category', null , [
    'onkeypress' => 'return validar_caracteres(event)',
    'class' => 'form-control']) }}
</th>
