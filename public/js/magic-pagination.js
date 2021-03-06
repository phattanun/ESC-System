var MagicPagi = new Object();
MagicPagi.init = function(setting) {
    this.target = setting['ul'];
    this.baseURL = setting['url'];
    this.min = setting['min'];
    this.max = setting['max'];
    this.range = setting['range'];
    this.JQUERYmode = typeof(setting['mode']) == "string" &&setting['mode'].toLowerCase() == "jquery";
    this.onclick = setting['onclick'];
    if(MagicPagi.JQUERYmode)
        $(window).bind('popstate', function(event) {
            MagicPagi.go(window.event.state);
            MagicPagi.onclick(window.event.state);
        });
    return this;
};
MagicPagi.go = function(currentPage) {
    window.history.replaceState(currentPage,'',this.baseURL + '/' + currentPage);
    this.currentPage = currentPage;
    this.start = Math.max(this.min,currentPage-this.range);
    this.end = Math.min(this.max,currentPage+this.range);
    this.moreStart = this.start > this.min;
    this.moreEnd = this.end < this.max;

    this.target.empty();
    // <<
    this.target.append('<li><a class="link" data-page=' + this.min + ' href="' + this.baseURL + '/' + this.min + '"><i class="fa fa-angle-double-left"></i></a></li>');

    // ...
    if(this.moreStart)
        this.target.append('<li class="disabled"><a style="cursor:initial;">...</a></li>');

    // 1 2 3
    for(i = this.start; i <= this.end; i++) {
        this.target.append('<li id="p' + i + '" ' + (i == this.currentPage?'class="active"':'') +'><a class="link" style="cursor:initial;" data-page="' + i + '" href="' + this.baseURL + '/' + i + '">' + i + '</a></li>');
    }

    // ...
    if(this.moreEnd)
        this.target.append('<li class="disabled"><a style="cursor:initial;">...</a></li>');

    // >>
    this.target.append('<li><a class="link" data-page=' + this.max + ' href="' + this.baseURL + '/' + this.max + '"><i class="fa fa-angle-double-right"></i></a></li>');

    if(this.JQUERYmode)
        this.target.find("a[class=link]").click(function(e) {
            e.preventDefault();
            var currPage = MagicPagi.target.find("li[class='active'] a").data('page');
            var nextPage = $(this).data('page');
            if(currPage != nextPage)
                window.history.pushState(currPage, '', $(this).attr('href'));
            MagicPagi.target.find("li[class='active']").removeClass('active');
            $(this.parentElement).addClass('active');
            MagicPagi.go(nextPage);
            MagicPagi.onclick(nextPage);
        });
};
