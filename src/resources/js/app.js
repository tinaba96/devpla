/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 // window.Vue = require('vue');
 // import Vue from 'vue';
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 // Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 // const app = new Vue({
 //     el: '#app',
 // });


 
 // var simpleMDE = new SimpleMDE({element: document.getElementById('editor')});
 
 
 var elements = document.getElementsByClassName("elem3");
 var button = document.getElementsByClassName("elem4");
 
 for(let i = 0; i < elements.length; i ++){
          elements[i].addEventListener('click',function(){
             if (button[i].classList.contains("hidden-comment") == true){
                 // noneで非表示
                 button[i].classList.remove("hidden-comment");
 
             }else if (button[i].classList.contains("hidden-comment") == false) {
                 // blockで表示
                 button[i].classList.add("hidden-comment");
             }else {
             } });
 }
 
 import { EmojiButton } from '@joeattardi/emoji-button';
 
 var trigger = document.getElementsByClassName("emoji-trigger");
 var bodyContent = document.getElementsByClassName("emoji");

 for(let i = 0; i < trigger.length; i ++){
         trigger[i].addEventListener('click',function(){
          const picker = new EmojiButton();
          picker.togglePicker(trigger[i]);
          picker.on('emoji',function(selection){
          var selectedemoji = selection.emoji;
          bodyContent[i].value += selectedemoji;})
          })
 }
 
 
 