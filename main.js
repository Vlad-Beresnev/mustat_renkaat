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

// When the document is ready
document.addEventListener("DOMContentLoaded", function() {
    // If there's a scroll position in sessionStorage, go to it
    if(sessionStorage.getItem('scrollPosition') !== null){
        window.scrollTo(0, sessionStorage.getItem('scrollPosition'));
    }

    // Get the form elements
    var searchForm = document.querySelector('#submit-search').form;
    var filterForm = document.querySelector('#submit-filter').form;

    // Add event listeners to the forms
    searchForm.addEventListener('submit', handleFormSubmit);
    filterForm.addEventListener('submit', handleFormSubmit);
});

function handleFormSubmit(event) {
    // Prevent the form from being submitted normally
    event.preventDefault();

    // Do whatever you need to do for form submission here

    // Store the scroll position in sessionStorage
    sessionStorage.setItem('scrollPosition', window.scrollY || document.documentElement.scrollTop);

    // Refresh the page manually
    location.reload();
}

// Before the page is refreshed
window.onbeforeunload = function() {
    // Store the scroll position in sessionStorage
    sessionStorage.setItem('scrollPosition', window.scrollY || document.documentElement.scrollTop);
}