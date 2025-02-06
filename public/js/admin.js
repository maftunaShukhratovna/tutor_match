function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.content').forEach((section) => {
        section.classList.add('hidden');
    });

    // Show the selected section
    document.getElementById(sectionId).classList.remove('hidden');
}