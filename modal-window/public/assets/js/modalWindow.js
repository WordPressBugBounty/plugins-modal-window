'use strict';

jQuery(document).ready(function($) {

    // Error checking
    if (!$ || typeof $ === 'undefined') {
        return console.log(
            '[ModalWindow] No jQuery library detected. Load ModalWindow after jQuery has been loaded on the page.');
    }

    $.fn.ModalWindow = function (options) {

        const _default = {
            overlay: true, // [Enabled, Background]
            blockPage: true,
            action: ['load', 0], // [Action, Delay]
            scrolled: [0, 'px'], // [Distance, Unit]
            animation: ['no', 400, 'no', 400], // [animationIn, speedIn, animationOut, speedOut]
            closeBtn: [false, 0], // [Remove, Delay]
            autoClose: [false, 5], // [Enable, Time]
            closeAction: [false, false], // [Overlay, Esc]
            video: [false, false, false], // [Enable, AutoPlay, StopOnClose]
            screenMax: [false, 1024], // [Enable, Screen]
            screenMin: [false, 480], // [Enable, Screen]
            mobile: [480, 85, '%'],
            floatBtnAnimation: [false, 'no', 5, 'has-animation', 5],// [ Animation Enable, animation, time, animation class, pause time]
            cookie: [false, 0, 'cookie-name', '.modal-only-once'], // [Enable cookie, days]
            closeRedirect: [false, '', ''],
            triggers: ['modal-open', 'modal-close', 'close-btn'],
            openSelectors: '',
            closeSelectors: '',
            byURL: [false, 'popup=active'],
            referrer: [false, ''],
            trackingOpen: [false, 'Modal Open', 'Modal Window', '', ''], // [Enable, Action, Category, Label, Value]
            trackingClose: [false, 'Modal Close', 'Modal Window', '', ''],// [Enable, Action, Category, Label, Value]
            geotargeting: false,
            countries: ['UA'],
            style: {},
            closeForm: 3,
        };

        return this.each(function () {

            const settings = $.extend(true, {}, _default, options);
            const self = this;
            const wrapper = $(this).children('.modal-window__wrapper');
            const content = $(wrapper).children('.modal-window__content');
            const fltBtn = $(self).children('.modal-float-button');
            const form = $(self).find('.modal-window__form');
            const otherForm =  $(self).find('.wpcf7, form.wpforms-form');
            const screen = $(window).width();
            const windowHeight = $(window).height();
            let lastFocusedElement;

            const videoSrc = checkVideo();

            if($(otherForm).length) {
                $(otherForm).on('wpcf7submit wpformsAjaxSubmitSuccess', formSubmission);
            }

            if ($(form).length) {
                $(form).on('submit', function (e) {
                    e.preventDefault();

                    const form = $(this);
                    const form_id = form.attr('id');
                    const result = form.find('.modal-window__form-result');
                    const dataform = form.serialize();
                    let data = {
                        action: 'modal_window_form',
                        nonce: ModalWindow.nonce,
                        form_id: form_id,
                    };
                    dataform.split('&').forEach(function (item) {
                        const splitItem = item.split('=');
                        data[decodeURIComponent(splitItem[0])] = decodeURIComponent(splitItem[1]);
                    });

                    $.ajax({
                        type: "POST",
                        url: ModalWindow.ajaxurl,
                        data: data,
                        success: function (msg) {
                            $(result).html(msg);
                            formSubmission();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            // Handle error
                            console.error("Ajax request failed: ", textStatus, errorThrown);
                        }
                    });

                });
            }

            function formSubmission() {
                let timer = parseInt(settings.closeForm) * 1000;
                setTimeout(function () {
                    closeModalWindow();
                }, timer);
            }


            function checkVideo() {
                let youtube = $(content).find('iframe[src*="youtube.com"]');
                let vimeo = $(content).find('iframe[src*="vimeo.com"]');
                if (youtube.length > 0) {
                    return youtube;
                } else if (vimeo.length > 0) {
                    return vimeo;
                } else {
                    return false;
                }
            }

            function checkDevices() {
                if (settings.screenMax[0] === true && settings.screenMax[1] < screen) {
                    return false;
                }

                return !(settings.screenMin[0] === true && settings.screenMin[1] > screen);
            }

            function checkURL() {
                if (!settings.byURL[0]) {
                    return true;
                }
                const popupParam = (settings.byURL[1]).split('=');
                const paramName = popupParam[0];
                const paramVal = popupParam[1];
                const params = new URLSearchParams(document.location.search);
                const name = params.get(paramName);
                return name === paramVal;
            }

            function checkReferrer() {
                if (!settings.referrer[0]) {
                    return true;
                }

                if (settings.referrer[1] === '') {
                    return true;
                }

                const referrerUrl = document.referrer;

                return referrerUrl.includes(settings.referrer[1]);
            }

            function setModalCookie() {
                if (!settings.cookie[0]) {
                    return;
                }
                let days = parseFloat(settings.cookie[1]);
                let now = new Date();
                const ttl = days * 24 * 60 * 60 * 1000;
                const item = {
                    value: 'yes',
                    expiry: now.getTime() + ttl,
                };
                localStorage.setItem(settings.cookie[2], JSON.stringify(item));
            }

            function getModalCookie(key) {
                const itemStr = localStorage.getItem(key);

                if (!itemStr) {
                    return false;
                }
                const item = JSON.parse(itemStr);
                const now = new Date();

                if (now.getTime() > item.expiry) {
                    localStorage.removeItem(key);
                    return false;
                }
                return true;
            }


            function _extractConfig(pieces) {
                const type = pieces[0];
                let options = {};

                options[pieces[1]] = pieces[2];

                if(type === 'scale') {
                    options.percent = 1;
                }

                return {type, options};
            }

            function videoAutoPlay() {
                if (settings.video[0] && settings.video[1] && videoSrc) {
                    let videoURL = $(videoSrc).attr('src');
                    $(videoSrc).attr('src', videoURL + '?autoplay=1');
                }
            }

            function videoStop() {
                if (settings.video[0] && settings.video[2] && videoSrc) {
                    let videoURL = $(videoSrc).attr('src');
                    videoURL = videoURL.split('?')[0];
                    $(videoSrc).attr('src', videoURL + '?autoplay=0');
                }
            }

            function showCloseButton() {
                const timer = parseInt(settings.closeBtn[1]) * 1000;
                setTimeout(function () {
                    $(content).find('.modal-window__close').fadeIn();
                }, timer);
            }

            function trackingOpen() {
                if (!settings.trackingOpen[0]) {
                    return false;
                }

                if (typeof window.gtag !== 'function') {
                    return false;
                }

                const action = settings.trackingOpen[1];

                let data = {
                    'event_category': settings.trackingOpen[2],
                };

                if (settings.trackingOpen[3]) {
                    data['event_label'] = settings.trackingOpen[3];
                }
                if (settings.trackingOpen[4]) {
                    data['value'] = settings.trackingOpen[4];
                }
                gtag('event', action, data);
            }

            function trackingClose() {
                if (!settings.trackingClose[0]) {
                    return false;
                }

                if (typeof window.gtag !== 'function') {
                    return false;
                }

                const action = settings.trackingClose[1];

                let data = {
                    'event_category': settings.trackingClose[2],
                };

                if (settings.trackingClose[3]) {
                    data['event_label'] = settings.trackingClose[3];
                }
                if (settings.trackingClose[4]) {
                    data['value'] = settings.trackingClose[4];
                }
                gtag('event', action, data);
            }

            // Get current counter by Geojs.io
            function geoTargeting() {
                return new Promise((resolve, reject) => {
                    fetch('https://get.geojs.io/v1/ip/country.json')
                        .then(response => response.json())
                        .then(data => {

                            if (settings.countries.includes(data.country)) {
                                resolve(true);
                            } else {
                                resolve(false);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            resolve(false);
                        });

                });
            }

            function autoCloseModal() {
                let timer = parseInt(settings.autoClose[1]) * 1000;
                setTimeout(function () {
                    closeModalWindow();
                }, timer);
            }

            function mobileRules() {
                if (settings.mobile[0] >= screen) {
                    $(self).css({
                        '--mw-width': `${settings.mobile[1]}${settings.mobile[2]}`
                    });
                }
            }

            async function checkOpenModal() {
                let checks = [];
                checks.push(checkDevices());
                checks.push(checkURL());
                checks.push(checkReferrer());

                if (settings.geotargeting) {
                    const geoResult = await geoTargeting();
                    checks.push(geoResult);
                }

                return checks.every(check => check === true);
            }

            function openActions() {
                videoAutoPlay();
                if (!settings.closeBtn[0]) {
                    showCloseButton();
                }
                if (settings.autoClose[0] === true) {
                    autoCloseModal();
                }
                if ($(fltBtn).length) {
                    $(fltBtn).addClass('is-paused');
                }
                setModalCookie();
                trackingOpen();
            }


            function openModalWindow() {

                if (getModalCookie(settings.cookie[2]) && settings.cookie[0]) {
                    return;
                }

                const speed = parseInt(settings.animation[1]);

                if (settings.overlay) {
                    $(wrapper).addClass('has-overlay');
                }

                if (settings.blockPage) {
                    $(wrapper).addClass('is-block');
                    $('html, body').addClass('no-scroll');
                }

                $(wrapper).fadeIn(speed, function () {
                    const animationType = settings.animation[0].split(':')[0];
                    const pieces = settings.animation[0].split(':');

                    const animations = {
                        'no': () => $(content).show(0),
                        'fade': () => $(content).fadeIn(speed),
                    };

                    const animate = animations[animationType] || function () {
                        const backgroundColor = $(content).css("background-color");
                        $(content).css({"background-color": backgroundColor});
                        const config = _extractConfig(pieces);
                        $(content).show(config.type, config.options, speed);
                    };

                    lastFocusedElement = document.activeElement;

                    setTimeout(() => {
                        $(content).focus();
                    }, 50);

                    $('body').children().each(function () {
                        if ($(this).find('.modal-window__content').length || $(this).hasClass('modal-window__content')) {
                            return;
                        }
                        $(this).attr('inert', '');
                    });

                    animate();
                    openActions();
                });

            }

            function openByLoad() {
                let delay = parseInt(settings.action[1]) * 1000;
                setTimeout(function () {
                    openModalWindow();
                }, delay);
            }

            function openByHover() {
                let trigger = settings.triggers[0];
                let triggers = '#' + trigger + ', .' + trigger + ', a[href$="' + trigger + '"]';
                if (settings.openSelectors !== undefined && settings.openSelectors.trim() !== "") {
                    triggers += `, ${settings.openSelectors}`;
                }
                $(triggers).on('mouseover', function (event) {
                    event.preventDefault();
                    openModalWindow();
                });
            }

            function openByExit() {
                let ticking = false;
                $(document).on('mouseleave', function (e) {
                    if (ticking === false) {
                        openModalWindow();
                    }
                    ticking = true;

                });
            }

            function openByScroll() {
                let ticking = false;

                $(document).on('scroll', function () {
                    let scrollTop = $(window).scrollTop();
                    let docHeight = $(document).height();
                    let winHeight = $(window).height();
                    if (settings.scrolled[1] === 'px') {
                        let scrollY = $(this).scrollTop();
                        if (scrollY >= settings.scrolled[0] && ticking === false) {
                            openByLoad();
                            ticking = true;
                        }
                    } else {
                        let scrollPercent = (scrollTop) / (docHeight - winHeight);
                        let scrollPercentRounded = Math.round(scrollPercent * 100);
                        if (scrollPercentRounded >= parseInt(settings.scrolled[0]) && ticking === false) {
                            openByLoad();
                            ticking = true;
                        }
                    }

                });
            }

            function openByRightClick() {
                $(document).on('contextmenu', function (e) {
                    e.preventDefault();
                    openByLoad();
                    return false;
                });
            }

            function openBySelectedText() {
                $(document).on('mouseup', function (e) {
                    let selected_text = ((window.getSelection && window.getSelection()) ||
                        (document.getSelection && document.getSelection()) ||
                        (document.selection && document.selection.createRange && document.selection.createRange().text));
                    if (selected_text.toString().length > 2) {
                        openByLoad();
                    }
                });
            }

            function openByClick() {
                const trigger = settings.triggers[0];
                let triggers = '#' + trigger + ', .' + trigger + ', a[href$="' + trigger + '"]';
                if (settings.openSelectors !== undefined && settings.openSelectors.trim() !== "") {
                    triggers += `, ${settings.openSelectors}`;
                }
                $(triggers).on('click', function (event) {
                    event.preventDefault();
                    openModalWindow();
                });
            }

            async function open() {

                if (!(await checkOpenModal())) {
                    return;
                }

                floatBtn();


                const action = settings.action[0];

                if (action === 'load') {
                    openByLoad();
                }
                if (action === 'hover') {
                    openByHover();
                }
                if (action === 'close') {
                    openByExit();
                }
                if (action === 'scroll') {
                    openByScroll();
                }
                if (action === 'rightclick') {
                    openByRightClick();
                }
                if (action === 'selectedtext') {
                    openBySelectedText();
                }

                openByClick();

            }

            function floatBtn() {

                if (!$(fltBtn).length) {
                    return;
                }
                $(fltBtn).removeClass('is-inactive');

                if (!settings.floatBtnAnimation[0]) {
                    return;
                }

                $(fltBtn).addClass(`has-animation ${settings.floatBtnAnimation[1]}`);
                stopFlBtnAnime();
            }

            function stopFlBtnAnime() {
                $(fltBtn).on('animationend webkitAnimationEnd', function (e) {
                    $(fltBtn).removeClass('has-animation');
                    runFlBtnAnime();
                });

            }

            function runFlBtnAnime() {
                let time = parseFloat(settings.floatBtnAnimation[4]) * 1000;
                setTimeout(function () {
                    $(fltBtn).addClass('has-animation');
                    stopFlBtnAnime();
                }, time);
            }

            function redirectOnClose() {
                if (settings.closeRedirect[0]) {
                    let redirectUrl = settings.closeRedirect[1];
                    if (redirectUrl !== '' && redirectUrl.indexOf('http') > -1) {
                        window.open(redirectUrl, settings.closeRedirect[2]);
                    }
                }
            }

            function closeModalWindow() {
                let speed = parseInt(settings.animation[3]);
                const animationType = settings.animation[2].split(':')[0];
                const pieces = settings.animation[2].split(':');

                $('[inert]').removeAttr('inert');
                if (lastFocusedElement) {
                    lastFocusedElement.focus();
                }

                const animations = {
                    'no': () => $(content).hide(0, closeOverlay),
                    'fade': () => $(content).fadeOut(speed, closeOverlay),
                };
                const animate = animations[animationType] || function () {
                    const config = _extractConfig(pieces);
                    $(content).hide(config.type, config.options, speed, closeOverlay);
                };
                animate();
                videoStop();
                redirectOnClose();
                trackingClose();
                if ($(fltBtn).length) {
                    $(fltBtn).removeClass('is-paused');
                }
            }

            function closeOverlay() {
                let speed = parseFloat(settings.animation[3]);
                if (settings.overlay) {
                    $(wrapper).fadeOut(speed);
                } else {
                    $(wrapper).fadeOut(0);
                }

                if (settings.blockPage) {
                    $(wrapper).removeClass('is-block');
                    $('html, body').removeClass('no-scroll');
                }
            }

            function closeByClick() {
                const trigger = settings.triggers[1];
                let triggers = '#' + trigger + ', .' + trigger + ', a[href$="' + trigger + '"]' + ', #' +
                    settings.triggers[2];
                if (settings.closeSelectors !== undefined && settings.closeSelectors.trim() !== "") {
                    triggers += `, ${settings.closeSelectors}`;
                }
                $(triggers).on('click', function (event) {
                    event.preventDefault();
                    closeModalWindow();
                });
                $(content).find('.modal-close-button').on('click', function () {
                    closeModalWindow();
                });
                $(content).find('.modal-window__close').on('click keydown', function (e) {
                    if (e.type === 'click' || e.key === 'Enter' || e.key === ' ') {
                        closeModalWindow();
                    }
                });
            }

            function closeByESC() {
                if (settings.closeAction[1]) {
                    $(window).on('keydown', function (event) {
                        if (event.key === 'Escape' || event.key === 'Esc') {
                            closeModalWindow();
                        }
                    });
                }
            }

            function closeByOverlay() {
                if (settings.closeAction[0] === true) {
                    $(wrapper).addClass('is-clickable');
                    $(wrapper).on('click', function (e) {
                        if (!$(e.target).closest('.modal-window__content').length) {
                            closeModalWindow();
                        }
                    });
                }
            }

            function close() {
                closeByClick();
                closeByESC();
                closeByOverlay();

            }

            function style() {
                $(self).css(settings.style);
                mobileRules();
            }

            style();
            open();
            close();
        });
    };


    if (typeof ModalWindow !== 'undefined') {
        for (var id in ModalWindow) {
            if (ModalWindow.hasOwnProperty(id) && id !== "nonce" && id !== "ajax") {
                $('#' + id).ModalWindow(ModalWindow[id]);
            }
        }
    }
});