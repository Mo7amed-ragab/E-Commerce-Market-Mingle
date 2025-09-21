// لجعل الأنيميشن يعمل مع البوتستراب
document.querySelectorAll('.dropdown').forEach(function(drop){
  drop.addEventListener('show.bs.dropdown', function(e){
    var menu = this.querySelector('.dropdown-menu');
    if(menu) menu.classList.add('custom-anim');
  });
  drop.addEventListener('hide.bs.dropdown', function(e){
    var menu = this.querySelector('.dropdown-menu');
    if(menu) menu.classList.remove('custom-anim');
  });
});

