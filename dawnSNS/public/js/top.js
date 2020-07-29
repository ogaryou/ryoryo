$(function(){
  

  $('.name').on({'click': function(){
    $('.drop-menu').toggle(300);
    $('.name').toggleClass('open');
  }
  });
  
});