document.addEventListener('DOMContentLoaded', function() {
    // Fetch dashboard data when the dashboard section is loaded
    const dashboardSection = document.getElementById('dashboard-section');

    if (dashboardSection) {
        fetch('fetch_dashboard_data.php') // PHP script to fetch dashboard data
            .then(response => response.json())
            .then(data => {
                // Update dashboard cards with received data
                document.querySelector('.card-container .card:nth-child(1) p').textContent = `$${data.total_balance}`;
                document.querySelector('.card-container .card:nth-child(2) p').textContent = `$${data.total_income}`;
                document.querySelector('.card-container .card:nth-child(3) p').textContent = `$${data.total_spending}`;
            })
            .catch(error => console.error('Error fetching dashboard data:', error));
    }
});