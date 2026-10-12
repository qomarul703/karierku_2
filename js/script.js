document.addEventListener('DOMContentLoaded', function() {

    const themeToggle = document.getElementById('theme-toggle');
    const sunIcon = '<i class="fas fa-sun"></i>';
    const moonIcon = '<i class="fas fa-moon"></i>';
    const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

    function applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            if (themeToggle) themeToggle.innerHTML = sunIcon;
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            if (themeToggle) themeToggle.innerHTML = moonIcon;
            localStorage.setItem('theme', 'light');
        }
    }

    if (currentTheme) {
        applyTheme(currentTheme);
    }

    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            let theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                applyTheme('light');
            } else {
                applyTheme('dark');
            }
        });
    }

    const quoteElement = document.getElementById('motivational-quote');
    if (quoteElement) {
        const quotes = [
            "Teruslah berusaha meraih mimpi, walaupun harus bertemu banyak kegagalan.",
            "Kalau sudah berani memulai jangan pernah mencoba untuk menyerah.",
            "Setiap dari kita memiliki keberuntungannya masing-masing.",
            "Pendidikan adalah senjata paling ampuh yang bisa kamu gunakan untuk mengubah dunia.",
            "Satu-satunya cara untuk melakukan pekerjaan hebat adalah dengan mencintai apa yang kamu lakukan."
        ];
        let currentQuoteIndex = Math.floor(Math.random() * quotes.length);

        function changeQuote() {
            quoteElement.textContent = quotes[currentQuoteIndex];
            currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
        }
        changeQuote();
        setInterval(changeQuote, 60000);
    }
});