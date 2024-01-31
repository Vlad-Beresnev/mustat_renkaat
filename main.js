document.addEventListener('DOMContentLoaded', function() {
    const filterButton = document.getElementById('filter-button');
    const filterContainer = document.getElementById('filter-container');

    filterButton.addEventListener('click', () => {
        if (filterContainer.style.display === 'block') {
            filterContainer.style.display = 'none';
        } else {
            filterContainer.style.display = 'block';
        }
    });
});
