import $ from 'jquery';
import validate from 'jquery-validation'
import '../scss/styles.scss';
import 'bootstrap';
import 'datatables.net';
import 'datatables.net-bs4';

window.$ = $;
window.validate = validate;

$(document).ready(function () {
  $('#task').DataTable({
    paging: false,
    searching: false,
    ordering: true,
    info: false
  });
  
  var formTaskAdd = $('#taskForm');
  var formLogin = $('#loginForm');
  var formUpdate = $('#updateForm');
  var submit = formTaskAdd.find("button[type=submit]");
  if (formTaskAdd) {
    formTaskAdd.validate({
      validClass: 'is-valid',
      errorClass: 'is-invalid',
      onfocusout: function (element) {
        // "eager" validation
        this.element(element);
      },
      rules: {
        name: "required",
        surname: "required",
        email: {
          required: true,
          email: true
        },
        task: "required",
      },
      messages: {
        name: "Пожалуйста введите ваше имя",
        surname: "Пожалуйста введите вашу фамилию",
        email: {
          required: "Нужно ввести ваш электронный адрес",
          email: "Ваш электронный адрес должен быть следующего формата address@site.com"
        },
        task: "Вы должна расписать задачу."
      },
    });
  }
  if (formLogin) {
    formLogin.validate({
      validClass: 'is-valid',
      errorClass: 'is-invalid',
      onfocusout: function (element) {
        // "eager" validation
        this.element(element);
      },
      rules: {
        login: "required",
        password: "required",
      },
      messages: {
        login: "Пожалуйста введите логин администратора",
        password: "Пожалуйста введите пароль",
      },
    })
  }
  if (formUpdate) {
    formUpdate.validate({
      validClass: 'is-valid',
      errorClass: 'is-invalid',
      onfocusout: function (element) {
        // "eager" validation
        this.element(element);
      },
      rules: {
        name: "required",
        surname: "required",
        email: {
          required: true,
          email: true
        },
        task: "required",
      },
      messages: {
        name: "Пожалуйста введите ваше имя",
        surname: "Пожалуйста введите вашу фамилию",
        email: {
          required: "Нужно ввести ваш электронный адрес",
          email: "Ваш электронный адрес должен быть следующего формата address@site.com"
        },
        task: "Вы должна расписать задачу."
      },
    });
  }
});