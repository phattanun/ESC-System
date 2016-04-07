var MagicPagi = new Object();
var debugggg;
MagicPagi.init = function(setting) {
    this.target = setting['ul'];
    this.baseURL = setting['url'];
    this.min = setting['min'];
    this.max = setting['max'];
    this.range = setting['range'];
    this.JQUERYmode = typeof(setting['mode']) == "string" &&setting['mode'].toLowerCase() == "jquery";
    this.onclick = setting['onclick'];
    return this;
};
MagicPagi.make = function(currentPage) {
    window.history.replaceState(currentPage,'',this.baseURL + '/' + currentPage);
    this.currentPage = currentPage;
    this.start = Math.max(this.min,currentPage-this.range);
    this.end = Math.min(this.max,currentPage+this.range);
    this.moreStart = this.start > this.min;
    this.moreEnd = this.end < this.max;

    this.target.empty();
    // <<
    this.target.append('<li><a data-page=' + this.min + ' href="' + this.baseURL + '/' + this.min + '"><i class="fa fa-angle-double-left"></i></a></li>');

    // ...
    if(this.moreStart)
        this.target.append('<li class="disabled"><a style="cursor:initial;">...</a></li>');

    // 1 2 3
    for(i = this.start; i <= this.end; i++) {
        this.target.append('<li id="p' + i + '" ' + (i == this.currentPage?'class="active"':'') +'><a data-page="' + i + '" href="' + this.baseURL + '/' + i + '">' + i + '</a></li>');
    }

    // ...
    if(this.moreEnd)
        this.target.append('<li class="disabled"><a style="cursor:initial;">...</a></li>');

    // >>
    this.target.append('<li><a data-page=' + this.max + ' href="' + this.baseURL + '/' + this.max + '"><i class="fa fa-angle-double-right"></i></a></li>');

    this.target.find('a').click(function(e) {
        e.preventDefault();
        console.log('push ' + MagicPagi.target.find("li[class='active'] a").data('page'));
        window.history.pushState(MagicPagi.target.find("li[class='active'] a").data('page'), '', $(this).attr('href'));
        MagicPagi.target.find("li[class='active']").removeClass('active');
        $(this.parentElement).addClass('active');
        MagicPagi.make($(this).data('page'));
        MagicPagi.onclick($(this).data('page'));
    });
};
$(window).bind('popstate', function(event) {
    MagicPagi.make(window.event.state);
    MagicPagi.onclick(window.event.state);
});
