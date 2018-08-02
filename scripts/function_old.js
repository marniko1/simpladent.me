var page = {
    init:function(){
        var that = this;
        that.specialistSlider.init();

        that.maskedInput.init();
        that.customSelect.initialise($('#citySelect'), {
            onOptionClick:function(data){
                console.log(data.value);
                var sliderObj = that.specialistSlider;
                $(sliderObj.container).find(sliderObj.listBlock).trigger('destroy');
                sliderObj.init(data.value);
                that.slider.initialise($(sliderObj.container));
                return true;
            }
        })
        that.map.init();

        $(window).on('scroll', function(){
            that.subMenu.scrollHandler();
            that.parallax.init()
        }).on('load', function(){
            that.slider.init();
            that.subMenu.init();
        })
        that.language.init();
        that.tools.init();
        $('.fancybox').fancybox({
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
        that.parallax.init()
    },
    specialistSlider:{
        container:"#specialistSlider",
        listBlock:".slider_list",
        itemClass:'specialist',
        itemTextBlockClass:'text',
        itemNameClass:'name',
        itemDescClass:'desc',
        itemImgClass:'img',
        rowCount:2,
        renderItem:function(id){
            var that = this;
            var itemData = specialistList[id];
            var item = $('<div class="' + that.itemClass + '" />');
            var itemName = $('<div class="' + that.itemNameClass + '" />').html(itemData.name);
            var itemDesc = $('<div class="' + that.itemDescClass + '" />').html(itemData.desc);
            var itemImg = $('<div class="' + that.itemImgClass + '" />').css({
                backgroundImage:'url("' + itemData.img + '")'
            })
            var textBlock = $('<div class="' + that.itemTextBlockClass + '" />');
            textBlock.append(itemName, itemDesc);
            item.append(itemImg, textBlock);
            return item;
        },
        init:function(cityId){
            var that = this;
            if(typeof specialistList == 'undefined') return false;
            $(that.container).find(that.listBlock).html('');
            var rowNum = 0;
            var newListItem;
            for(var i = 0; i < specialistList.length; i++){
                if(cityId != "" && cityId != undefined && specialistList[i].cityId != cityId) continue;
                if(rowNum == 0){
                    newListItem = $('<li />');
                }
                newListItem.append(that.renderItem(i));
                if(rowNum == that.rowCount - 1){
                    $(that.container).find(that.listBlock).append(newListItem);
                    rowNum = 0;
                } else {
                    rowNum++;
                }
            }
            if(rowNum == that.rowCount - 1){
                $(that.container).find(that.listBlock).append(newListItem);
                rowNum = 0;
            }

        }
    },
    slider:{
        container:".slider",
        sliderBlock:'.slider_list',
        prevBtn:'.left_arr',
        nextBtn:'.right_arr',
        speed:800,
        init:function(){
            var that = this;
            $(that.container).each(function(){
                that.initialise($(this));
            })
        },
        initialise:function(slider){
            var that = this;
            var visibleItemsCount = slider.data('row');
            slider.find(that.sliderBlock).children().css({
                width: slider.width() / visibleItemsCount
            })
            slider.find(that.sliderBlock).carouFredSel({
                width:'100%',
                height:'auto',
                infinite:false,
                circular:false,
                direction: 'left',
                scroll:  that.speed,
                swipe:{
                    onTouch:true
                },
                items: {
                    visible: visibleItemsCount
                },
                auto: false,
                prev: slider.find(that.prevBtn),
                next: slider.find(that.nextBtn)
            }, {
                transition: true
            });
        }
    },
    subMenu:{
        container:'#header',
        block:'.subMenu',
        speed:800,
        screens:'.section',
        currentScreen:0,
        screensOffsetPos:[],
        currentScreenId:undefined,
        subMenuHeight:52,
        init:function(){
            var that = this;
            that.windowHeight = $(window).innerHeight();
            that.windowWidth = $(window).innerWidth();
            that.getScreensOffsetPos();
            that.initScreen();
            that.setActiveMenuItem();
            var subMenuBlock = $(that.container + ' ' + that.block);
            subMenuBlock.find('a').on('click', function(){
                var id = $(this).attr('href');
                var offsetTop = $(id).offset().top;
                $('body, html').animate({
                    scrollTop: offsetTop - $(that.container).outerHeight() - that.subMenuHeight
                }, that.speed);
                return false;
            })

        },
        scrollHandler:function(){
            var that = this;
            var left = $(window).scrollLeft();
            $(that.container).css('left', -left);
            that.getCurrentScreen();
            that.setActiveMenuItem();
        },
        getScreensOffsetPos:function(){
            var that = this;
            $(that.screens).each(function(index, element){
                that.screensOffsetPos[index] = $(this).offset().top;
            })
        },
        initScreen:function(){
            var that = this;
            for(var i = 0; i<that.screens.length; i++){
                if($(window).scrollTop() + that.windowHeight > that.screensOffsetPos[i]){
                    that.currentScreen = i;
                    that.currentScreenId = $(that.screens).eq(that.currentScreen).attr('id');
                }
            }
        },
        getCurrentScreen:function(){
            var that = this;

            for(var i = 0; i < that.screensOffsetPos.length; i++){
                if($(window).scrollTop() + that.windowHeight/2 > that.screensOffsetPos[i]){
                    that.currentScreen = i;
                    that.currentScreenId = $(that.screens).eq(that.currentScreen).attr('id');
                }
                console.log($(window).scrollTop() + that.windowHeight/2, that.screensOffsetPos[i], that.currentScreen)
            }
        },
        setActiveMenuItem: function(){
            var that = this;
            $(that.container + ' ' + that.block + ' li').removeClass('active');
            $(that.container + ' ' + that.block + ' a').filter('[href="#' + that.currentScreenId + '"]').parent().addClass('active');
        }
    },
    maskedInput:{
        input:'.masked',
        init:function(){
            var that = this;
            $(that.input).each(function(){
                var mask = $(this).data('mask');
                var placeholder = mask.replace(/[9]/g, '_');
                $(this).mask(mask);
                $(this).attr('placeholder', placeholder);
            })
        }
    },
    customSelect:{
        container:'.customSelect',
        selectedBlock:'.option_select',
        dropdownBlock:'.dropdown',
        optionList:'.option_list',
        option:'.option',
        input:'.selectInput',
        openedSelectClass:'active',
        droppedClass:'customSelectDropped',
        defaultSettings:{
            disabled:false,
            opened:false,
            duration: 0,
            maxHeight: 0,
            selectedOptionClass:'active',
            getSelectedOnInit: true,
            customScroll:false,
            customScrollBlock:'.dropdown_scrollbox',
            onInit: function(data){
                return true;
            },
            onOptionClick: function(data){
                return true;
            }
        },
        init:function(){

        },
        initialise:function(select, customSettings){
            var that = this;
            var settings = $.extend(that.defaultSettings, customSettings);
            var dropdownBlock = select.find(that.dropdownBlock);
            var option_list = select.find(that.optionList);
            var data = {};
            
            dropdownBlock.show();

            if(settings.maxHeight > 0) {
                if(!dropdownBlock.find(settings.customScrollBlock).length){
                    var wrap = $('<div class="' + settings.customScrollBlock + '" />');
                    wrap.css({
                        'max-height': settings.maxHeight,
                        'overflow': 'auto'
                    })
                    wrap.html(option_list);
                    dropdownBlock.html(wrap);
                    if(settings.customScroll && jQuery().jScrollPane) wrap.jScrollPane();
                }
            }

            var optionSelect = select.find(that.selectedBlock);
            var input = select.find(that.input);
            var liOptions = option_list.find(that.option);
            var liOptionsActive = liOptions.filter(settings.selectedOptionClass);

            if(liOptions.length == 1) settings.disabled = true;

            dropdownBlock.hide();

            if(!liOptionsActive.length && settings.getSelectedOnInit) {
                liOptions.eq(0).addClass(settings.selectedOptionClass);
                liOptionsActive = liOptions.eq(0);
            }

            data.value = liOptionsActive.data("value");
            var callbackInit = settings.onInit(data);
            var html = liOptionsActive.html();

            optionSelect.html(html);

            optionSelect.off('click').on("click", function(){
                if(settings.disabled) return false;
                $(that.droppedClass).filter(that.openedSelectClass).not(select).each(function(){
                    $(this).removeClass(that.openedSelectClass).find(that.dropdownBlock).stop(true, true).slideUp(settings.duration);
                })
                if(dropdownBlock.is(':visible')) {
                    dropdownBlock.stop(true, true).slideUp(settings.duration, function(){
                        select.removeClass(that.openedSelectClass);
                    });
                } else {
                    select.addClass(that.openedSelectClass);
                    dropdownBlock.stop(true, true).slideDown(settings.duration);
                }

            })
            if(input.length) {
                var val = liOptionsActive.data("value");
                input.val(val);
            }
            liOptions.off('click').on("click", function(index, element){
                data.value = $(this).data("value");
                var preventDefault = settings.onOptionClick(data);
                if(preventDefault){
                    var html = $(this).html();
                    $(this).addClass(settings.selectedOptionClass).siblings().removeClass(settings.selectedOptionClass);
                    liOptionsActive = $(this);
                    optionSelect.html(html);
                    if(input.length) {
                        var val = liOptionsActive.data("value");
                        input.val(val);
                    }
                }
                dropdownBlock.stop(true, true).slideUp(settings.duration, function(){
                    select.removeClass(that.openedSelectClass);
                });
            })

            select.off('click').on("click", function(e){
                e.stopPropagation();
            })
            $("body").click(function(){
                dropdownBlock.stop(true, true).slideUp(settings.duration, function(){
                    select.removeClass(that.openedSelectClass);
                });
            })
            select.addClass(that.droppedClass);
        }
    },
    map:{
        container:'#contactsMapBlock',
        mapBlock:'#mapBlock',
        map:'#map',
        citiesList:'#cities_list',
        citiesListItem:'li',
        addressList:'#addresses_list',
        addressItem:'.address',
        selectedClass:'active',
        cityClass:'city',
        transform:{
            left: 22.137679,
            right: 40.220728,
            top:52.374875,
            bottom:44.432266
        },
        init:function(){
            var that = this;
            that.initialisation();
        },
        initialisation:function(){
            var that = this;
            $(that.citiesList).find(that.citiesListItem).each(function(index, element){
                var cityLink = $(this);
                var id = cityLink.data('id');
                var coords = that.coordsTransform(cityLink.data('coords'));
                var cityPoint = $('<div class="' + that.cityClass + '" title="' + cityLink.html() + '" />').css(coords);
                $(that.mapBlock).append(cityPoint);

                cityLink.on('click', function(){
                    that.onClickHandler(cityLink, cityPoint, id);
                })
                cityPoint.on('click', function(){
                    that.onClickHandler(cityLink, cityPoint, id);
                })

            })
        },
        onClickHandler:function(link, point, id){
            var that = this;
            $(that.citiesList).find(that.citiesListItem).removeClass(that.selectedClass);
            $(that.mapBlock).find('.' + that.cityClass).removeClass(that.selectedClass);
            link.addClass(that.selectedClass);
            point.addClass(that.selectedClass);
            $(that.addressList).html('');
            if(typeof(addressList) == "undefined") return false;
            var addresses = addressList[id];
            for(var i = 0; i < addresses.length; i++){
                var address = $('<div class="' + that.addressItemClass + '">' + addresses[i] + '</div>');
                $(that.addressList).append(address);
            }
        },
        coordsTransform:function(coords){
            var that = this;
            coords = coords.split(',');
            var coordX = +coords[1];
            var coordY = +coords[0];
            var cssX = (coordX - that.transform.left)/(that.transform.right - that.transform.left)*100;
            var cssY = (coordY - that.transform.bottom)/(that.transform.top - that.transform.bottom)*100;
            return {
                left: cssX +'%',
                bottom: cssY + '%'
            }
        }
    },
    video:{
        player:undefined,
        container:'#videoBlock',
        videoList: undefined,
        videoNameBlockClass:'name',
        videoDescBlockClass:'desc',
        videoImgBlockClass:'img',
        videoFrameBlockClass:'frame',
        videoListContainer:'#videoList ul',
        mainVideoContainer:'#videoBlock',
        prevBtn:'.left_arr',
        nextBtn:'.right_arr',
        mainVideoBlockId:'player',
        playerStatus:false,
        activeVideo:undefined,
        activeVideoItemClass:'active',
        scrollSpeed:400,
        init:function(){
            var that = this;
            if(typeof videoList != 'undefined') {
                that.videoList = videoList;
                that.renderVideoList();
                that.checkVideo(0);
                that.navigate();
                that.play();
            }
        },
        renderVideoList:function(){
            var that = this;
            for(var i = 0; i < that.videoList.length; i++){
                that.renderVideoItem(i);
            }
        },
        renderVideoItem:function(id){
            var that = this;

            var videoItemBlock = $('<li/>').data('id', id);
            var videoNameBlock = $("<div class='" + that.videoNameBlockClass + "'></div>");
            var videoImgBlock = $("<div class='" + that.videoImgBlockClass + "'></div>");

            var videoItem = that.videoList[id];
            videoNameBlock.html(videoItem.name);
            videoImgBlock.css({
                backgroundImage: 'url("http://img.youtube.com/vi/' + videoItem.youtubeId + '/0.jpg")'
            })
            videoItemBlock.append(videoNameBlock,videoImgBlock);

            $(page.video.videoListContainer).append(videoItemBlock);

        },
        checkVideo:function(id){
            var that = this;
            var videoItem = that.videoList[id];
            $(that.mainVideoContainer).find('.' + that.videoNameBlockClass).html(videoItem.name);
            $(that.mainVideoContainer).find('.' + that.videoImgBlockClass).css({
                backgroundImage: 'url("http://img.youtube.com/vi/' + videoItem.youtubeId + '/0.jpg")'
            })
            $(that.mainVideoContainer).find('.' + that.videoDescBlockClass).html(videoItem.desc);
            if(that.playerStatus){
                that.player.loadVideoById(videoItem.youtubeId);
            } else {
                if(that.player) that.player.destroy();
                that.player = new YT.Player(that.mainVideoBlockId, {
                    height: '100%',
                    width: '100%',
                    videoId: videoItem.youtubeId,
                    playerVars: {
                        wmode: "opaque"
                    }
                });
            }
            $(that.videoListContainer).find('li').eq(id).addClass(that.activeVideoItemClass).siblings().removeClass(that.activeVideoItemClass);
            that.activeVideo = id;
        },
        navigate:function(){
            var that = this;
            $(that.videoListContainer).find('li').on('click', function(){
                var curItem = $(this);
                $('html, body').animate({
                    scrollTop: $(that.container).offset().top - $('#header').height()
                }, that.scrollSpeed);
                setTimeout(function(){
                    that.checkVideo(curItem.data('id'));
                }, that.scrollSpeed)
            });
            $(that.mainVideoContainer).find(that.prevBtn).on('click', function(){
                that.prevVideo();
                return false;
            });
            $(that.mainVideoContainer).find(that.nextBtn).on('click', function(){
                that.nextVideo();
                return false;
            })
        },
        prevVideo:function(){
            var that = this;
            var newVideoId = (that.activeVideo - 1 < 0) ? (that.videoList.length - 1) : (that.activeVideo - 1);
            that.checkVideo(newVideoId);
        },
        nextVideo:function(){
            var that = this;
            var newVideoId = (that.activeVideo + 1 > that.videoList.length - 1) ? 0 : (that.activeVideo + 1);
            that.checkVideo(newVideoId);
        },
        play:function(){
            var that = this;
            $(that.mainVideoContainer).find('.' + that.videoImgBlockClass).on('click', function(){
                that.player.playVideo();
                $(this).hide();
                that.playerStatus = true;
            })
        }
    },
    language:{
        container:'.lang_block',
        trigger:'.header',
        activeClass:'active',
        init:function(){
            var that = this;
            $(that.container).find(that.trigger).on('click', function(){
                $(that.container).toggleClass(that.activeClass);
            })
            $(that.container).on('click', function(e){
                e.stopPropagation();
            })
            $('body').on('click', function(){
                $(that.container).removeClass(that.activeClass);
            })
        }
    },
    tools:{
        container:'#tools',
        formBlock:'.form_block',
        trigger:'.header',
        activeClass:'active',
        init:function(){
            var that = this;
            $(that.container).find(that.formBlock).each(function(){
                var curr = $(this);
                curr.find(that.trigger).on('click', function(){
                    curr.toggleClass(that.activeClass);
                    curr.siblings(that.formBlock).removeClass(that.activeClass);
                    if($(window).scrollTop() < 314) $('html, body').animate({scrollTop:314}, 500);
                    that.valign();
                })
            })
        },
        valign:function(){
            var that = this;
            var active = $(that.container).find(that.formBlock).filter('.active');
            if(active.hasClass('appointment')){
                $(that.container).css({
                    top: -116
                });
            } else if(active.hasClass('callback')){
                $(that.container).css({
                    top: -58
                });
            } else {
                $(that.container).css({
                    top: 0
                });
            }
        }
    },
    parallax:{
        offset1:0,
        offset2:319,
        init: function(){
            var that = this;
            var scrolled = $(window).scrollTop();
            if(!$('#page').hasClass('contacts')){
                $(".main_img").css('top', that.offset1-(0-(scrolled*.35)));
            }
            if(scrolled>=286){
                $("#tools").addClass('fixed');
                $('#main_menu .active').addClass('showSubmenu');
            } else {
                $("#tools").removeClass('fixed');
                $('#main_menu .active').removeClass('showSubmenu');
            }
        }
    }
}
page.init();
function onYouTubeIframeAPIReady() {
    page.video.init();
}


/*** Wih 06.10.2014 ***/



                    $(function(){
                        $("#customerID").hide();
                        $("#contactForm").dialog({
                             autoOpen: false, 
                             height: 250,
                             width: 400,
                             resizable: false, 
                        });  
                    });
                    function openContact(name){
                        $("#contactForm").dialog('open');
                        $("#city").val(name);
                    }
                    function sendContact(){
                        alert();
                    }
                    $(document).ready(function(){
                        $("#contact").submit(function(){
                            $.ajax({
                                url: 'includes/contact/contact.php',
                                type: "POST",
                                data: $("#contact").serialize(),
                                dataType: 'html',
                                statusCode: {
                                    
                                        403: function(data) { 
                                            alert(data.responseText);
                                        },
                                        200: function(data) {
                                            alert(data);
                                            $("#contact").trigger('reset');
                                            $("#contactForm").dialog('close');
                                        }
                                }
                            });
                            return false;
                        });
                    });


