<th>
   <div class="controls">
       {{Form::text('name_activity_category', null , [
   'id'=> 'add_category',
   'onkeypress' => 'return validar_letras(event)',
   'onblur' => 'aMayusculas(this.value,this.id)',
   'class' => 'form-control upletter']) }}
   </div>
</th>
<th>
   <div class="controls">
       {{Form::text('description_activity_category', null , [
   'onkeypress' => 'return validar_caracteres(event)',
   'class' => 'form-control']) }}
   </div>
</th>
