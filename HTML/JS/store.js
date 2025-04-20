document.addEventListener('DOMContentLoaded', function () {
    // Set initial active state
    const initialOption = document.querySelector('.sidebar-btn.active');

    // Add scroll handler
    window.addEventListener('scroll', handleScroll);

    // Add click handlers for items
    document.querySelectorAll('.item-cell').forEach(item => {
        item.addEventListener('click', function () {
            const currentOption = document.querySelector('.sidebar-btn.active').textContent.replace('Option ', '');
            const itemData = {
                image: this.querySelector('img').src,
                name: this.querySelector('.item_name').textContent,
                price: this.querySelector('.price').textContent.replace('$', ''),
                discount: this.querySelector('.discount')?.textContent.replace('% off', '') || ''
            };
            window.location.href = `individual_item.php?${new URLSearchParams(itemData).toString()}&option=${currentOption}`;
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.sidebar-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const optionNumber = btn.dataset.option;
        document.querySelectorAll('.sidebar-btn.active')
                .forEach(el => el.classList.remove('active'));
        btn.classList.add('active');
        window.location.href = `store.php?option=${optionNumber}`;
      });
    });
  });  

/*function handleScroll() {
    const sidebar = document.querySelector('.side-bar');
    const scrollY = window.scrollY || window.pageYOffset;

    if (scrollY > 250) {
        sidebar.style.position = 'fixed';
        sidebar.style.top = '20px';
        sidebar.style.width = `${sidebar.offsetWidth}px`;
    } else {
        sidebar.style.position = 'static';
        sidebar.style.width = 'auto';
    }
}*/