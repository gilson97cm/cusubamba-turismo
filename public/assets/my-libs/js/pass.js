$(document).ready(function(){
    'use strict';
  //  alert('ojojo');
    $('#show').mousedown(function(){
      $('#password').removeAttr('type');
      $('#show').addClass('fa-eye-slash').removeClass('fa-eye');
    });
    $('#show').mouseup(function(){
        $('#password').attr('type','password');
        $('#show').addClass('fa-eye').removeClass('fa-eye-slash');
    });

    $('#confirm-show').mousedown(function(){
        $('#confirm-pass').removeAttr('type');
        $('#confirm-show').addClass('fa-eye-slash').removeClass('fa-eye');
    });
    $('#confirm-show').mouseup(function(){
        $('#confirm-pass').attr('type','password');
        $('#confirm-show').addClass('fa-eye').removeClass('fa-eye-slash');
    });

});

