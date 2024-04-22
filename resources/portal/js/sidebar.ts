const sidebar = document.getElementById("sidebar");

function toggleSidebarMobile(
    sidebar: HTMLElement,
    sidebarBackdrop: HTMLElement,
    toggleSidebarMobileHamburger: HTMLElement,
    toggleSidebarMobileClose: HTMLElement,
) {
    sidebar.classList.toggle("hidden");
    sidebarBackdrop.classList.toggle("hidden");
    toggleSidebarMobileHamburger.classList.toggle("hidden");
    toggleSidebarMobileClose.classList.toggle("hidden");
}

if (sidebar) {
    const toggleSidebarMobileEl = document.getElementById(
        "toggleSidebarMobile",
    );
    const sidebarBackdrop = document.getElementById("sidebarBackdrop");
    const toggleSidebarMobileHamburger = document.getElementById(
        "toggleSidebarMobileHamburger",
    );

    const toggleSidebarMobileClose = document.getElementById(
        "toggleSidebarMobileClose",
    );

    if (
        toggleSidebarMobileClose &&
        toggleSidebarMobileEl &&
        sidebarBackdrop &&
        toggleSidebarMobileHamburger
    ) {
        toggleSidebarMobileEl.addEventListener("click", () => {
            toggleSidebarMobile(
                sidebar,
                sidebarBackdrop,
                toggleSidebarMobileHamburger,
                toggleSidebarMobileClose,
            );
        });

        sidebarBackdrop.addEventListener("click", () => {
            toggleSidebarMobile(
                sidebar,
                sidebarBackdrop,
                toggleSidebarMobileHamburger,
                toggleSidebarMobileClose,
            );
        });
    }
}
