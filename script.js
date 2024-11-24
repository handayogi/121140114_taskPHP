document.getElementById("registrationForm").addEventListener("submit", function(e) {
    const fullname = document.getElementById("fullname").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const gender = document.querySelector('input[name="gender"]:checked').value;
    const resume = document.getElementById("resume").files[0];

    // Validasi form agar tidak kosong
    if (fullname.length < 3) {
        alert("Nama lengkap minimal terdiri dari 3 karakter.");
        e.preventDefault();
        return;
    }

    if (resume) {
        const allowedTypes = ["application/txt"];
        if (!allowedTypes.includes(resume.type)) {
            alert("Hanya file TXT yang diizinkan.");
            e.preventDefault();
            return;
        }
        if (resume.size > 2 * 1024 * 1024) { // 2 MB
            alert("Ukuran file terlalu besar.");
            e.preventDefault();
            return;
        }
    } else {
        alert("Silakan upload resume.");
        e.preventDefault();
    }
});