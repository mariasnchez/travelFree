const settingsButton = document.querySelector('.relative button');

        const dropdown = document.querySelector('.relative .absolute');

        settingsButton.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
        });