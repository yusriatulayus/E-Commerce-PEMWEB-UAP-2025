/* Floating Hearts */
const heartsContainer = document.getElementById('hearts-container');

for (let i = 0; i < 18; i++) {
    const heart = document.createElement('div');
    heart.classList.add('heart');
    heart.innerHTML = '♥';
    heart.style.left = `${Math.random() * 100}%`;
    heart.style.top = `${Math.random() * 100}%`;
    heart.style.animationDelay = `${Math.random() * 5}s`;
    heartsContainer.appendChild(heart);
}

/* View Details */
document.querySelectorAll('.view-details').forEach(btn => {
    btn.addEventListener('click', () => {
        alert("Product details will open.");
    });
});

/* Price Slider */
const slider = document.querySelector('.price-slider');
slider.addEventListener('input', () => {
    document.querySelector('.price-range span:last-child').textContent = `$${slider.value}`;
});

/* Category Click */
document.querySelectorAll('.category-item').forEach(item => {
    item.addEventListener('click', () => {
        document.querySelectorAll('.category-item').forEach(i => i.classList.remove('active'));
        item.classList.add('active');
    });
});
