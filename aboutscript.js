const readMoreBtn = document.getElementById('read-more-btn');
const moreInfo = document.querySelector('.more-info');

readMoreBtn.addEventListener('click', () => {
    if (moreInfo.style.display === 'none') {
        moreInfo.style.display = 'block';
        readMoreBtn.textContent = 'Read Less';
    } else {
        moreInfo.style.display = 'none';
        readMoreBtn.textContent = 'Read More...';
    }
});

