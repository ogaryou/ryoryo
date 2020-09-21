$(function(){
  

  $('.name').on({'click': function(){
    $('.drop-menu').toggle(300);
    $('.name').toggleClass('open');
  }
  });

  var id =$('.label').attr('id');
  var ids =$('.edit-modal').data('id');
  
  var modalMenu = false;
  '.update'+ids
  var scrollPos;
  $('.fa-edit').on('click',function(){
    scrollPos = $(window).scrollTop();
    var click =  $(this).data('id');
    console.log(click);
   
      $('.editModal-'+click).fadeIn();
      $('body').css({position: 'fixed', top: -scrollPos });
    // if( modalMenu  === false) {
    //   modal.fadeIn();
    //   modalMenu = true;
    //  }
    // else if(modalMenu === true) {
    //   modal.fadeOut();
    //   modalMenu = false;
    //  }
    return false;
});

    var modal =$('.delete').attr('delete');
    $('.fa-trash-alt').on('click',function(){
      scrollPos = $(window).scrollTop();
      var click =  $(this).data('delete');
      $('.deleteModal-'+click).fadeIn();
      $('body').css({position: 'fixed', top: -scrollPos });

      return false;
    
    });
    $('.btn-cancel').on('click',function(){
      window.location.href = '/top';
   
    })





// $('.edit-modal').on('show.bs.modal', function (event) {
//   var label = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
//   var recipient = label.data('id') //data-whatever の値を取得
//   //Ajaxの処理はここに
//   var modal = $(this)  //モーダルを取得
//   modal.find('.form-update').text('photoid：' + recipient) //モーダルのタイトルに値を表示
//   modal.find('.form-update').val(recipient) //inputタグにも表示
// })

  
});