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

document.addEventListener('DOMContentLoaded', () => {
    // Toggle edit mode
    const editBtn = document.getElementById('toggle-edit');
    if (editBtn) {
        editBtn.addEventListener('click', () => {
            const url = new URL(window.location);
            url.searchParams.set('edit', '1');
            window.location = url;
        });
    }

    // Clone a blank option row
    document.getElementById('add-option')?.addEventListener('click', () => {
        const list = document.getElementById('options-list');
        const idx = list.children.length;
        const div = document.createElement('div');
        div.className = 'option-row';
        div.innerHTML = `<input type="text" name="options[${idx}]" placeholder="New option name">`;
        list.append(div);
    });

    // Clone a blank item row
    document.getElementById('add-item')?.addEventListener('click', () => {
        const list = document.getElementById('items-list');
        const idx = list.children.length;
        const div = document.createElement('div');
        div.className = 'item-row';
        div.innerHTML = `
        <input type="file" name="image_file[${idx}]"><br>
        <input type="text" name="name[${idx}]"   placeholder="Name">
        <input type="text" name="price[${idx}]"  placeholder="Price">
        <input type="text" name="discount[${idx}]" placeholder="Discount">
      `;
        list.append(div);
    });
});
