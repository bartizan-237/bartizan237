function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  return {
    // dark: getThemeFromLocalStorage(),
    dark: false,
    toggleTheme() {
      // this.dark = !this.dark
      this.dark = false;
      console.log(this.dark);
      setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isPagesMenuOpen1: false,
    isPagesMenuOpen2: false,
    isPagesMenuOpen3: false,
    isPagesMenuOpen4: false,
    isPagesMenuOpen5: false,
    isPagesMenuOpen6: false,
    togglePagesMenu1() {
      this.isPagesMenuOpen1 = !this.isPagesMenuOpen1
    },
    togglePagesMenu2() {
      this.isPagesMenuOpen2 = !this.isPagesMenuOpen2
    },
    togglePagesMenu3() {
      this.isPagesMenuOpen3 = !this.isPagesMenuOpen3
    },
    togglePagesMenu4() {
      this.isPagesMenuOpen4 = !this.isPagesMenuOpen4
    },
    togglePagesMenu5() {
      this.isPagesMenuOpen5 = !this.isPagesMenuOpen5
    },
    togglePagesMenu6() {
      this.isPagesMenuOpen6 = !this.isPagesMenuOpen6
    },
    isTempleteMenuOpen1: false,
    isTempleteMenuOpen2: false,
    isTempleteMenuOpen3: false,
    isTempleteMenuOpen4: false,
    toggleTempleteMenu1() {
      this.isTempleteMenuOpen1 = !this.isTempleteMenuOpen1
    },
    toggleTempleteMenu2() {
      this.isTempleteMenuOpen2 = !this.isTempleteMenuOpen2
    },
    toggleTempleteMenu3() {
      this.isTempleteMenuOpen3 = !this.isTempleteMenuOpen3
    },
    toggleTempleteMenu4() {
      this.isTempleteMenuOpen4 = !this.isTempleteMenuOpen4
    },
    /*isScripttagsPagesMenuOpen: false,
    toggleScripttagsPagesMenu() {
      this.isScripttagsPagesMenuOpen = !this.isScripttagsPagesMenuOpen
    },*/
    // Modal
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },
    closeModal() {
      this.isModalOpen = false
      this.trapCleanup()
    },
    // Modal1
    isModalOpen1: false,
    trapCleanup1: null,
    openModal1() {
      this.isModalOpen1 = true
      this.trapCleanup1 = focusTrap(document.querySelector('#modal1'))
    },
    closeModal1() {
      this.isModalOpen1 = false
      this.trapCleanup1()
    },
    // Modal2
    isModalOpen2: false,
    trapCleanup2: null,
    openModal2() {
      this.isModalOpen2 = true
      this.trapCleanup2 = focusTrap(document.querySelector('#modal2'))
    },
    closeModal2() {
      this.isModalOpen2 = false
      this.trapCleanup2()
    },
    // Modal3
    isModalOpen3: false,
    trapCleanup3: null,
    openModal3() {
      this.isModalOpen3 = true
      this.trapCleanup3 = focusTrap(document.querySelector('#modal3'))
    },
    closeModal3() {
      this.isModalOpen3 = false
      this.trapCleanup3()
    },
    // Modal4
    isModalOpen4: false,
    trapCleanup4: null,
    openModal4() {
      this.isModalOpen4 = true
      this.trapCleanup4 = focusTrap(document.querySelector('#modal4'))
    },
    closeModal4() {
      this.isModalOpen4 = false
      this.trapCleanup4()
    },
    // Modal5
    isModalOpen5: false,
    trapCleanup5: null,
    openModal5() {
      this.isModalOpen5 = true
      this.trapCleanup5 = focusTrap(document.querySelector('#modal5'))
    },
    closeModal5() {
      this.isModalOpen5 = false
      this.trapCleanup5()
    },
  }
}
