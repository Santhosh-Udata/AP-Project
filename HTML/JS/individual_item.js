(() => {
    const { basePrice, discountRate } = window.itemConfig;
    const adjustments = { S: -2, M: -1, L: 0, XL: 1, XXL: 2 };

    let currentSize = 'L';
    let currentQty = 1;

    const sizeBtns = document.querySelectorAll('.size-btn');
    const qtySelect = document.getElementById('quantity');
    const priceEl = document.getElementById('price');
    const buyBtn = document.getElementById('buy-now');
    const modal = document.getElementById('modal-overlay-item');
    const modalText = document.getElementById('modal-text-item');
    const confirmBtn = document.getElementById('confirm-btn-item');

    function updatePrice() {
        const adjustedUnit = basePrice + adjustments[currentSize];
        const total = adjustedUnit * currentQty;
        priceEl.textContent = '$' + total.toFixed(2);
    }

    sizeBtns.forEach(btn => {
        const sz = btn.dataset.size;
        if (sz === currentSize) btn.classList.add('active');
        btn.addEventListener('click', () => {
            sizeBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentSize = sz;
            updatePrice();
        });
    });

    qtySelect.addEventListener('change', e => {
        currentQty = Number(e.target.value);
        updatePrice();
    });

    updatePrice();

    buyBtn.addEventListener('click', () => {
        document.body.style.overflow = 'hidden';
        const adjustedUnit = basePrice + adjustments[currentSize];
        const totalWithDiscount = (adjustedUnit * currentQty) * (1 - discountRate);
        modalText.textContent = 'Final Amount (with discount): $' + totalWithDiscount.toFixed(2);
        modal.classList.remove('hidden-item');
    });

    confirmBtn.addEventListener('click', () => {
        window.open('images/buy.jpg', '_blank');
    });
    const cancelBtn = document.getElementById('cancel-btn-item');

    cancelBtn.addEventListener('click', () => {
        modal.classList.add('hidden-item');
        document.body.style.overflow = '';
    });

})();
