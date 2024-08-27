document.querySelectorAll('.show-more').forEach(function(button) {
    button.addEventListener('click', function() {
        var content = this.previousElementSibling;
        if (content.classList.contains('expanded')) {
            content.classList.remove('expanded');
            this.textContent = 'عرض المزيد';
        } else {
            content.classList.add('expanded');
            this.textContent = 'عرض أقل';
        }
    });
});