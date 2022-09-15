function activePanelTab() {
    let news = $('.tab__news')
    let src = $('.tab__sources')
    switch (window.location.pathname) {
        case '/':
            news.attr('class', 'tab__news is-active')
            src.attr('class', 'tab__sources')
            break
        case '/src':
            news.attr('class', 'tab__news')
            src.attr('class', 'tab__sources is-active')
            break
    }
}
