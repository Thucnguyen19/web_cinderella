$(function(){
  // Khi một checkbox có class .checkbox_wrapper được nhấp vào
  $('.checkbox_wrapper').on('click',function(){
      // Tìm tất cả các checkbox con trong cùng một phần tử .card
      // và đặt trạng thái của chúng giống như checkbox .checkbox_wrapper
      $(this).parents('.card').find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
  });
  // Khi một checkbox có class .checkall được nhấp vào
  $('.checkall').on('click',function(){
      // Tìm tất cả các checkbox trong toàn bộ form
      // và đặt trạng thái của chúng giống như checkbox .checkall
      $(this).parents().find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
      $(this).parents().find('.checkbox_wrapper').prop('checked',$(this).prop('checked'));
  })
})
