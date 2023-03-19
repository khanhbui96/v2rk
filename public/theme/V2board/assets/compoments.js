(window["webpackJsonp"] = window["webpackJsonp"] || []).push([
    [0], {
        "+3vq": function(e, t, n) {},
        "+Jtn": function(e, t, n) {
            "use strict";
            n("DYRE");
            var a = n("zeV3"),
                r = n("wd/R"),
                c = n.n(r),
                s = n("9kvl"),
                i = n("55Ip"),
                o = n("UbMB"),
                l = n.n(o),
                d = n("nKUr"),
                u = function(e) {
                    var t = e.planName,
                        n = e.expiredDay,
                        r = e.expiredAt,
                        o = e.leftDay,
                        u = e.leftHour,
                        b = e.resetDay,
                        m = e.percentBar,
                        j = e.usedTraffic,
                        f = e.transferTotal,
                        p = e.timeLimit,
                        h = e.startSec,
                        O = e.endSec,
                        g = Object(s["g"])(),
                        v = l()("progress-bar", "progress-bar-striped", "progress-bar-animated", { "bg-success": Number(m) < 100, "bg-danger": Number(m) >= 100 });
                    return Object(d["jsx"])(d["Fragment"], { children: Object(d["jsxs"])("div", { children: [Object(d["jsx"])("h3", { className: "h4 font-w700 mb-1", children: Object(d["jsxs"])(a["b"], { children: [t, p && Object(d["jsxs"])("span", { className: "font-size-sm text-primary", children: [Object(d["jsx"])("i", { className: "fa fa-clock" }), " ", c()().startOf("day").seconds(h).format("HH:mm"), " -", " ", c()().startOf("day").seconds(O).format("HH:mm")] })] }) }), Object(d["jsxs"])("p", { className: "font-size-sm text-muted", children: [null === n && Object(d["jsx"])("span", { children: g.formatMessage({ id: "subscribe.summary.not_expired" }) }), null !== o && o > 0 && Object(d["jsx"])("span", { children: null !== b ? g.formatMessage({ id: "subscribe.summary.expire_tip" }, { expiredDay: n, leftDay: o, resetDay: b }) : g.formatMessage({ id: "subscribe.summary.expire_tip_not_reset" }, { expiredDay: n, leftDay: o }) }), null !== u && u > 0 && o <= 0 && Object(d["jsx"])("span", { children: g.formatMessage({ id: "subscribe.summary.expire_hour_tip" }, { expiredDay: n, leftHour: u }) }), null !== r && r < Math.ceil(c.a.now() / 1e3) && Object(d["jsx"])(i["a"], { className: "font-w600 text-danger", to: "", onClick: function(e) { e.preventDefault() }, children: g.formatMessage({ id: "subscribe.summary.expired" }) })] }), Object(d["jsxs"])("div", { className: "mb-0", children: [Object(d["jsx"])("div", { className: "progress mb-1", style: { height: "6px" }, children: Object(d["jsx"])("div", { className: v, role: "progressbar", style: { width: "".concat(m, "%") } }) }), Object(d["jsx"])("p", { className: "font-size-sm font-w600 mb-3", children: Object(d["jsx"])("span", { className: "font-w700", children: g.formatMessage({ id: "subscribe.summary.stats" }, { usedTraffic: j, transferTotal: f }) }) })] })] }) })
                };
            t["a"] = u
        },
        "+ego": function(e, t, n) {
            "use strict";
            n.r(t);
            n("GNNt");
            var a = n("wEI+"),
                r = n("tJVT"),
                c = (n("xR9T"), n("X8fG")),
                s = n("q1tI"),
                i = (n("lnzr"), n("qVdP"), n("jsC+")),
                o = (n("lUTK"), n("BvKs")),
                l = n("k1fw"),
                d = n("9og8"),
                u = n("WmNS"),
                b = n.n(u),
                m = n("9kvl"),
                j = n("55Ip"),
                f = n("CLrh"),
                p = n("nKUr"),
                h = function() {
                    var e, t, n = Object(s["useState"])(!1),
                        a = Object(r["a"])(n, 2),
                        u = a[0],
                        h = a[1],
                        O = Object(m["h"])("@@initialState"),
                        g = O.initialState,
                        v = O.setInitialState,
                        x = Object(m["g"])(),
                        w = function(e) { h(e) },
                        k = function() {
                            var e = Object(d["a"])(b.a.mark((function e(t) {
                                return b.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return t.preventDefault(), e.next = 3, Object(f["m"])();
                                        case 3:
                                            c["m"] && localStorage.removeItem("auth_data"), v((function(e) { return Object(l["a"])(Object(l["a"])({}, e), {}, { currentUser: void 0 }) })), window.location.reload();
                                        case 6:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function(t) { return e.apply(this, arguments) }
                        }(),
                        _ = function() { return Object(p["jsx"])(p["Fragment"], { children: Object(p["jsxs"])(o["a"], { style: { boxShadow: "0 .25rem 2rem rgba(0,0,0,.08)", borderColor: "#ebebeb" }, selectable: !1, children: [Object(p["jsx"])(o["a"].Item, { icon: Object(p["jsx"])("i", { className: "far fa-fw fa-user mr-1", children: " " }), children: Object(p["jsx"])(j["a"], { to: "#", style: { fontSize: "1rem" }, onClick: function(e) { e.preventDefault(), m["c"].push("/profile"), h(!1) }, children: x.formatMessage({ id: "module.profile" }) }) }, "0"), Object(p["jsx"])(o["a"].Item, { icon: Object(p["jsx"])("i", { className: "far fa-fw fa-arrow-alt-circle-left mr-1", children: " " }), children: Object(p["jsx"])(j["a"], { to: "#", onClick: k, style: { fontSize: "1rem" }, children: x.formatMessage({ id: "common.logout" }) }) }, "1")] }) }) };
                    return Object(p["jsx"])(p["Fragment"], { children: Object(p["jsx"])(i["a"], { overlay: _, placement: "bottomLeft", onVisibleChange: w, visible: u, children: Object(p["jsxs"])("button", { type: "button", className: "btn btn-primary", onClick: function(e) { e.preventDefault() }, children: [Object(p["jsx"])("i", { className: "far fa fa-user-circle", children: " " }), Object(p["jsx"])("span", { className: "d-none d-lg-inline ml-1", children: null === g || void 0 === g || null === (e = g.currentUser) || void 0 === e || null === (t = e.data) || void 0 === t ? void 0 : t.email }), Object(p["jsx"])("i", { className: "fa fa-fw fa-angle-down ml-1", children: " " })] }) }) })
                },
                O = h,
                g = n("AHJW"),
                v = function() {
                    var e = "1" === localStorage.getItem("dark-mode"),
                        t = Object(g["a"])(e),
                        n = Object(r["a"])(t, 2),
                        a = n[0],
                        c = n[1].toggle,
                        s = function() { return Object(p["jsx"])(p["Fragment"], { children: Object(p["jsx"])(o["a"], { style: { boxShadow: "0 .25rem 2rem rgba(0,0,0,.08)", borderColor: "#ebebeb" } }) }) };
                    return Object(p["jsx"])(p["Fragment"], { children: Object(p["jsx"])(i["a"], { overlay: s, children: Object(p["jsxs"])("button", { type: "button", className: "btn btn-default mr-1", onClick: function(e) { e.preventDefault(), c(), localStorage.setItem("dark-mode", a ? "0" : "1") }, children: [!1 === a && Object(p["jsx"])("i", { className: "far fa fa-sun" }), !0 === a && Object(p["jsx"])("i", { className: "far fa fa-moon" })] }) }) })
                },
                x = v,
                w = n("sqeV"),
                k = function(e) {
                    var t = Object(m["h"])("useMenuModel"),
                        n = t.menuIndex,
                        a = t.menuName,
                        r = Object(m["h"])("useMenuModel"),
                        c = r.menus,
                        s = e.onSideOpen;
                    return Object(p["jsx"])("header", { id: "page-header", children: Object(p["jsxs"])("div", { className: "content-header", children: [Object(p["jsx"])("div", { className: "sidebar-toggle", children: Object(p["jsx"])("button", { type: "button", className: "btn btn-primary mr-1 d-lg-none", "data-toggle": "layout", "data-action": "sidebar_toggle", onClick: function(e) { e.preventDefault(), s() }, children: Object(p["jsx"])("i", { className: "fa fa-fw fa-bars" }) }) }), Object(p["jsx"])("div", { className: "v2board-header-title", children: "" !== a ? a : n && c.getName(n) }), Object(p["jsx"])(x, {}), Object(p["jsx"])(w["a"], { placement: "bottomRight" }), Object(p["jsx"])(O, {})] }) })
                },
                _ = k,
                y = (n("IXGU"), n("//k0"), n("UbMB")),
                N = n.n(y),
                S = function(e) {
                    var t = e.index,
                        n = e.name,
                        a = e.icon,
                        r = e.url,
                        c = e.onSideClose,
                        s = Object(m["h"])("useMenuModel"),
                        i = s.menuIndex,
                        o = N()("nav-main-link-icon", "si", "si-".concat(a)),
                        l = N()("nav-main-link", { active: t === i });
                    return Object(p["jsx"])(p["Fragment"], { children: Object(p["jsx"])("li", { className: "nav-main-item", children: Object(p["jsxs"])(j["a"], { className: l, to: r, onClick: c, children: [Object(p["jsx"])("i", { className: o, children: " " }), Object(p["jsx"])("span", { className: "nav-main-link-name", children: n })] }) }) })
                },
                M = S,
                C = function(e) {
                    var t = e.onSideClose,
                        n = Object(m["h"])("useMenuModel"),
                        a = n.menus,
                        r = n.menuIndex,
                        c = n.setMenuIndex,
                        i = Object(m["g"])();
                    return Object(s["useEffect"])((function() {
                        var e = a.getIndex(m["c"].location.pathname);
                        void 0 !== e && e !== r && c(e)
                    }), [m["c"].location.pathname]), Object(p["jsx"])(p["Fragment"], { children: Object(p["jsx"])("div", { className: "content-side content-side-full", children: Object(p["jsxs"])("ul", { className: "nav-main", children: [Object(p["jsx"])(M, { url: a.getPath("dashboard"), name: a.getName("dashboard"), index: "dashboard", icon: a.getIcon("dashboard"), onSideClose: t }), Object(p["jsx"])(M, { url: a.getPath("knowledge"), name: a.getName("knowledge"), index: "knowledge", icon: a.getIcon("knowledge"), onSideClose: t }), Object(p["jsx"])("li", { className: "nav-main-heading", children: i.formatMessage({ id: "module.group.subscription" }) }), Object(p["jsx"])(M, { url: a.getPath("subscribe"), name: a.getName("subscribe"), index: "subscribe", icon: a.getIcon("subscribe"), onSideClose: t }), Object(p["jsx"])(M, { url: a.getPath("plan"), name: a.getName("plan"), index: "plan", icon: a.getIcon("plan"), onSideClose: t }), Object(p["jsx"])("li", { className: "nav-main-heading", children: i.formatMessage({ id: "module.group.billing" }) }), Object(p["jsx"])(M, { url: a.getPath("order"), name: a.getName("order"), index: "order", icon: a.getIcon("order"), onSideClose: t }), Object(p["jsx"])(M, { url: a.getPath("invite"), name: a.getName("invite"), index: "invite", icon: a.getIcon("invite"), onSideClose: t }), Object(p["jsx"])("li", { className: "nav-main-heading", children: i.formatMessage({ id: "module.group.account" }) }), Object(p["jsx"])(M, { url: a.getPath("profile"), name: a.getName("profile"), index: "profile", icon: a.getIcon("profile"), onSideClose: t }), Object(p["jsx"])(M, { url: a.getPath("ticket"), name: a.getName("ticket"), index: "ticket", icon: a.getIcon("ticket"), onSideClose: t }), Object(p["jsx"])(M, { url: a.getPath("traffic"), name: a.getName("traffic"), index: "traffic", icon: a.getIcon("traffic"), onSideClose: t })] }) }) })
                },
                T = C,
                I = function(e) {
                    var t = e.onSideClose,
                        n = Object(s["useRef"])(null);
                    return Object(p["jsx"])(p["Fragment"], { children: Object(p["jsxs"])("nav", { id: "sidebar", ref: n, children: [Object(p["jsx"])("div", { className: "smini-hidden bg-header-dark", children: Object(p["jsxs"])("div", { className: "content-header justify-content-lg-center bg-white-10", children: [Object(p["jsx"])(j["a"], { className: "font-size-lg text-white", to: "/", children: Object(p["jsx"])("span", { className: "text-white-75", children: c["r"] }) }), Object(p["jsx"])("div", { className: "d-lg-none", children: Object(p["jsx"])(j["a"], { className: "text-white ml-2", to: "", onClick: function(e) { e.preventDefault(), t() }, children: Object(p["jsx"])("i", { className: "fa fa-times-circle" }) }) })] }) }), Object(p["jsx"])(T, { onSideClose: t })] }) })
                },
                D = I,
                E = (n("DYRE"), n("zeV3")),
                R = (n("+BJd"), n("mr32")),
                F = (n("Tems"), function(e) {
                    e.name;
                    var t = e.version,
                        n = e.copyRightMark,
                        a = e.year;
                    console.log(n);
                    var r = Object(m["h"])("useCommonModel"),
                        c = r.yearCopy,
                        s = function() { return Object(p["jsxs"])("div", { className: "col-sm-6 order-sm-1 text-center text-sm-left", children: ["\xa9 ", Object(p["jsx"])("span", { "data-toggle": "year-copy", children: a || c().toString() }), Object(p["jsx"])("a", { href: "https://shopquangtien.click", target: "_blank", children: " đổi thẻ cào tại đây" }), " \ud83d\ude80 Version: ", Object(p["jsx"])("code", { children: Object(p["jsx"])(R["a"], { color: "blue", children: t }) })] }) };
                    return Object(p["jsx"])(p["Fragment"], { children: Object(p["jsx"])("footer", { id: "page-footer", className: "bg-body-light", children: Object(p["jsxs"])("div", { className: "content py-0", children: [Object(p["jsx"])("div", { className: "d-none", children: n }), Object(p["jsxs"])("div", { className: "row font-size-sm", children: [Object(p["jsx"])("div", { className: "col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right", children: Object(p["jsx"])(E["b"], { children: Object(p["jsx"])("div", { class: "site-footer-legal", children: Object(p["jsxs"])("a", { href: "https://t.me/shopvpnnqt", target: "_blank", children: [Object(p["jsx"])("i", { class: "fab fa-telegram" }), " Nh\xf3m chat Telegram"] }) }) }) }), s()] })] }) }) })
                }),
                P = F,
                q = n("+Gva"),
                A = n("st5d"),
                U = n("D7Yy"),
                L = n("ui4b"),
                V = n("nDBu"),
                G = function(e) {
                    var t = Object(s["useState"])(!1),
                        n = Object(r["a"])(t, 2),
                        i = n[0],
                        o = n[1],
                        l = e.children,
                        d = e.location,
                        u = "1" === localStorage.getItem("dark-mode");
                    Object(g["a"])(u, void 0, { ignoreInlineStyle: ["path"], invert: [], ignoreImageAnalysis: [], css: "background-color: ${white} !important;", disableStyleSheetsProxy: !1 });
                    var b, j = N()("sidebar-o", "side-scroll", "page-header-fixed", "main-content-boxed", "side-trans-enabled", { "sidebar-o-xs": i, "page-header-dark": "dark" === c["i"], "sidebar-dark": "dark" === c["q"] });
                    if (b = c["m"] || !1 === c["l"] ? "./theme/".concat(c["d"], ".css") : "/theme/v2board/assets/theme/".concat(c["d"], ".css"), Object(L["a"])(b, { async: !1, type: "css" }), Object(V["a"])(c["r"]), Object(c["k"])(d.pathname)) return Object(p["jsx"])(p["Fragment"], { children: l });
                    var f = function() { o(!0) },
                        h = function() { o(!1) },
                        O = q["a"];
                    return "en-US" === Object(m["b"])() ? O = U["a"] : "vi-VN" === Object(m["b"])() && (O = A["a"]), Object(p["jsx"])(p["Fragment"], { children: Object(p["jsx"])(a["a"], { locale: O, children: Object(p["jsxs"])("div", { id: "page-container", className: j, children: [Object(p["jsx"])("div", { className: "v2board-nav-mask", onClick: h, style: { display: i ? "block" : "none" } }), Object(p["jsx"])(D, { onSideClose: h }), Object(p["jsx"])(_, { onSideOpen: f }), Object(p["jsx"])("main", { id: "main-container", children: l }), Object(p["jsx"])(P, { copyRightMark: c["e"], name: c["r"], version: c["s"] })] }) }) })
                };
            t["default"] = G
        },
        "//k0": function(e, t, n) {},
        "0JFy": function(e, t, n) {
            "use strict";
            n.r(t);
            n("T2oS");
            var a = n("W9HT"),
                r = n("oBTY"),
                c = n("9og8"),
                s = n("tJVT"),
                i = n("WmNS"),
                o = n.n(i),
                l = n("u2Z1"),
                d = n("q1tI"),
                u = n("CLrh"),
                b = n("ye1Q"),
                m = n("9kvl"),
                j = n("nKUr"),
                f = function() {
                    var e = Object(d["useState"])(),
                        t = Object(s["a"])(e, 2),
                        n = t[0],
                        i = t[1],
                        f = Object(d["useState"])([]),
                        p = Object(s["a"])(f, 2),
                        h = p[0],
                        O = p[1];
                    return Object(d["useEffect"])((function() {
                        Object(c["a"])(o.a.mark((function e() {
                            var t, n;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(u["k"])({ language: Object(m["b"])() });
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        i(t), n = [], Object.keys(t.data).forEach((function(e) { n = [].concat(Object(r["a"])(n), [e]) })), O(n);
                                    case 9:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []), Object(j["jsx"])(j["Fragment"], { children: Object(j["jsx"])("div", { className: "content content-full", children: void 0 !== n ? Object(j["jsx"])(l["a"], { categories: h, knowledges: n }) : Object(j["jsx"])(a["a"], { indicator: Object(j["jsx"])(b["a"], { style: { fontSize: 24 }, spin: !0 }) }) }) })
                };
            t["default"] = f
        },
        "0rWx": function(e, t, n) {
            "use strict";
            n.r(t);
            var a = n("oBTY"),
                r = n("9og8"),
                c = n("tJVT"),
                s = (n("Znn+"), n("ZTPi")),
                i = n("WmNS"),
                o = n.n(i),
                l = n("q1tI"),
                d = n("9kvl"),
                u = (n("fV52"), n("3I+P")),
                b = (n("861x"), n("2qtc"), n("kLXV")),
                m = n("1M3H"),
                j = n.n(m),
                f = n("nKUr"),
                p = new j.a({ html: !0 }),
                h = function(e) {
                    var t = e.title,
                        n = e.visible,
                        a = e.onCancel,
                        r = e.children;
                    return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsx"])(b["a"], { title: t, footer: null, visible: n, onCancel: a, children: Object(f["jsx"])("div", { dangerouslySetInnerHTML: { __html: p.render(r) } }) }) })
                },
                O = h,
                g = n("CLrh"),
                v = n("wd/R"),
                x = n.n(v),
                w = function() {
                    var e = Object(l["useState"])(),
                        t = Object(c["a"])(e, 2),
                        n = t[0],
                        a = t[1],
                        s = Object(l["useState"])(!1),
                        i = Object(c["a"])(s, 2),
                        b = i[0],
                        m = i[1],
                        j = Object(l["useState"])(),
                        p = Object(c["a"])(j, 2),
                        h = p[0],
                        v = p[1],
                        w = Object(d["g"])();
                    Object(l["useEffect"])((function() {
                        Object(r["a"])(o.a.mark((function e() {
                            var t;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(g["n"])();
                                    case 2:
                                        if (t = e.sent, void 0 !== t && void 0 !== t.data) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        a(t.data);
                                    case 6:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []);
                    var k = function() { m(!0) },
                        _ = function() { m(!1) },
                        y = function(e) { v(e), k() };
                    return Object(f["jsxs"])(f["Fragment"], { children: [Object(f["jsx"])(u["a"], { autoplay: !0, children: n && n.map((function(e) { return Object(f["jsx"])("div", { children: Object(f["jsx"])("a", { className: "block block-rounded bg-image mb-0 v2board-bg-pixels", href: "#", style: { backgroundImage: "url(".concat(e.img_url, ")"), backgroundSize: "cover" }, onClick: function(t) { t.preventDefault(), y(e) }, children: Object(f["jsxs"])("div", { className: "block-content bg-black-50", children: [Object(f["jsx"])("div", { className: "mb-5 mb-sm-7 d-sm-flex justify-content-sm-between align-items-sm-center", children: Object(f["jsx"])("p", { children: Object(f["jsx"])("span", { className: "badge badge-danger font-w700 p-2 text-uppercase", children: w.formatMessage({ id: "dashboard.notice.announcement" }) }) }) }), Object(f["jsx"])("p", { className: "font-size-lg font-w700 text-white mb-1", children: e.title }), Object(f["jsx"])("p", { className: "font-w600 text-white-75", children: x.a.unix(Number(e.created_at)).format("DD-MM-YYYY") })] }) }) }, e.id) })) }), void 0 !== h && Object(f["jsx"])(O, { title: h.title, visible: b, onCancel: _, children: h.content })] })
                },
                k = w,
                _ = n("k1fw"),
                y = n("55Ip"),
                N = n("vjGn"),
                S = n("+Jtn"),
                M = function() {
                    var e, t = Object(d["h"])("useSubModel"),
                        n = t.subState,
                        a = n,
                        r = n,
                        c = !0 === n.isAvailable,
                        s = c ? "/plan/".concat(null === (e = n.planID) || void 0 === e ? void 0 : e.toString()) : "/plan",
                        i = Object(d["g"])(),
                        o = function() { return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsxs"])("div", { className: "justify-content-md-between align-items-md-center", children: [Object(f["jsx"])(S["a"], Object(_["a"])({}, a)), Object(f["jsxs"])("div", { className: "mb-3", children: [Object(f["jsx"])(N["a"], Object(_["a"])({}, r)), Object(f["jsxs"])(y["a"], { className: "btn btn-sm btn-outline-primary btn-rounded px-3 mr-1 my-1", to: "/subscribe", children: [Object(f["jsx"])("i", { className: "fa fa-cog mr-1" }), i.formatMessage({ id: "dashboard.subscribe.view_subscription" })] }), Object(f["jsxs"])(y["a"], { className: "btn btn-sm btn-outline-danger btn-rounded px-3 my-1", to: s, children: [!1 === c && Object(f["jsxs"])(f["Fragment"], { children: [Object(f["jsx"])("i", { className: "fa fa-shopping-cart mr-1" }), i.formatMessage({ id: "dashboard.subscribe.purchase" })] }), !0 === c && Object(f["jsxs"])(f["Fragment"], { children: [Object(f["jsx"])("i", { className: "fa fa-redo mr-1" }), i.formatMessage({ id: "dashboard.subscribe.renew" })] })] })] })] }) }) },
                        l = function() { return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsx"])(y["a"], { to: "/plan", children: Object(f["jsxs"])("div", { className: "text-center", children: [Object(f["jsx"])("div", { children: Object(f["jsx"])("i", { className: "fa fa-plus fa-2x" }) }), Object(f["jsx"])("div", { className: "font-size-sm font-w700 text-uppercase text-muted pt-2 pb-3", children: i.formatMessage({ id: "module.plan" }) })] }) }) }) };
                    return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsxs"])("div", { className: "block block-rounded js-appear-enabled", children: [Object(f["jsx"])("div", { className: "block-header block-header-default", children: Object(f["jsx"])("h3", { className: "block-title", children: i.formatMessage({ id: "module.subscribe" }) }) }), Object(f["jsx"])("div", { className: "block-content", children: n.planID > 0 ? o() : l() })] }) })
                },
                C = M,
                T = (n("R9oj"), n("ECub")),
                I = (n("DYRE"), n("zeV3")),
                D = n("axB/"),
                E = function() {
                    var e = Object(l["useState"])(!1),
                        t = Object(c["a"])(e, 2),
                        n = t[0],
                        a = t[1],
                        s = Object(l["useState"])([]),
                        i = Object(c["a"])(s, 2),
                        u = i[0],
                        b = i[1],
                        m = Object(d["h"])("@@initialState"),
                        j = m.initialState,
                        p = Object(d["h"])("useSubModel"),
                        h = p.subState,
                        O = j || {},
                        v = O.currentUser,
                        w = Object(c["a"])(u, 2),
                        k = w[0],
                        _ = w[1],
                        N = Object(d["g"])(),
                        S = function() { a(!0) },
                        M = function() { a(!1) };
                    Object(l["useEffect"])((function() {
                        Object(r["a"])(o.a.mark((function e() {
                            var t;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(g["D"])();
                                    case 2:
                                        t = e.sent, b(t.data);
                                    case 4:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []);
                    var C = function(e) { e.preventDefault(), S() },
                        E = function() { return Object(f["jsxs"])(f["Fragment"], { children: [Object(f["jsx"])("div", { className: "alert alert-danger", role: "alert", children: Object(f["jsxs"])(I["b"], { children: [N.formatMessage({ id: "dashboard.event.bind_telegram" }), Object(f["jsx"])(y["a"], { className: "alert-link", to: "", onClick: function(e) { C(e) }, children: N.formatMessage({ id: "dashboard.event.click_bind" }) })] }) }), Object(f["jsx"])(D["a"], { subscribeUrl: h.subscribeUrl, visiable: n, onCancel: M })] }) },
                        R = function() { return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsx"])("div", { className: "alert alert-danger", role: "alert", children: Object(f["jsxs"])(I["b"], { children: [N.formatMessage({ id: "dashboard.event.unpaid_orders" }), Object(f["jsx"])(y["a"], { className: "alert-link", to: "/order", children: N.formatMessage({ id: "dashboard.event.pay_now" }) })] }) }) }) },
                        F = function() { return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsx"])("div", { className: "alert alert-danger", role: "alert", children: Object(f["jsx"])(I["b"], { children: N.formatMessage({ id: "dashboard.event.suspend" }, { time: x.a.unix(Number(null === v || void 0 === v ? void 0 : v.data.recovery_at)).format("DD/MM/YYYY HH:mm") }) }) }) }) },
                        P = function() { return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsx"])("div", { className: "alert alert-warning", role: "alert", children: Object(f["jsxs"])(I["b"], { children: [N.formatMessage({ id: "dashboard.event.open_ticket" }, { number: Object(f["jsx"])("strong", { children: _ }) }), Object(f["jsx"])(y["a"], { className: "alert-link", to: "/ticket", children: N.formatMessage({ id: "dashboard.event.view_now" }) })] }) }) }) },
                        q = function() { return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsx"])(T["a"], { image: T["a"].PRESENTED_IMAGE_SIMPLE, description: N.formatMessage({ id: "dashboard.event.nothing" }) }) }) };
                    return Object(f["jsx"])(f["Fragment"], { children: Object(f["jsxs"])("div", { className: "block block-rounded js-appear-enabled", children: [Object(f["jsx"])("div", { className: "block-header block-header-default", children: Object(f["jsx"])("h3", { className: "block-title", children: N.formatMessage({ id: "dashboard.event.pending" }) }) }), Object(f["jsxs"])("div", { className: "block-content", children: [0 === (null === v || void 0 === v ? void 0 : v.data.telegram_id) && E(), (null === v || void 0 === v ? void 0 : v.data.is_suspend) && F(), k > 0 && R(), _ > 0 && P(), (null === v || void 0 === v ? void 0 : v.data.telegram_id) > 0 && 0 === k && 0 === _ && !1 === (null === v || void 0 === v ? void 0 : v.data.is_suspend) && q()] })] }) })
                },
                R = E,
                F = (n("+BJd"), n("mr32")),
                P = (n("MXD1"), n("CFYs")),
                q = function() { return Object(f["jsxs"])(f["Fragment"], { children: [Object(f["jsx"])(P["a"], { percent: 100, status: "active" }), Object(f["jsx"])("p", { children: "C\u1ed5ng thanh to\xe1n " }), Object(f["jsx"])(P["a"], { percent: 100, status: "active" }), Object(f["jsx"])("p", { children: "B\u0103ng th\xf4ng" }), Object(f["jsx"])(P["a"], { percent: 100 }), Object(f["jsx"])("p", { children: "C\xe2n b\u1eb1ng t\u1ea3i" }), Object(f["jsx"])(P["a"], { percent: 100, showInfo: !1 }), Object(f["jsx"])(F["a"], { color: "green", children: "shopvpn.net" })] }) },
                A = q,
                U = n("gRxi"),
                L = n("m5Fu"),
                V = function() {
                    var e = Object(d["g"])(),
                        t = Object(l["useState"])(),
                        n = Object(c["a"])(t, 2),
                        a = n[0],
                        s = n[1],
                        i = Object(l["useState"])(""),
                        u = Object(c["a"])(i, 2),
                        b = u[0],
                        m = u[1],
                        j = Object(l["useState"])(""),
                        p = Object(c["a"])(j, 2),
                        h = p[0],
                        O = p[1],
                        v = Object(l["useState"])(!1),
                        x = Object(c["a"])(v, 2),
                        w = x[0],
                        k = x[1];
                    return Object(l["useEffect"])((function() {
                        Object(r["a"])(o.a.mark((function t() {
                            var n, a;
                            return o.a.wrap((function(t) {
                                while (1) switch (t.prev = t.next) {
                                    case 0:
                                        return t.next = 2, Object(g["B"])();
                                    case 2:
                                        if (n = t.sent, void 0 !== n) { t.next = 5; break }
                                        return t.abrupt("return");
                                    case 5:
                                        m(n.data.map_config.fill_color), O(n.data.map_config.marker_color), a = n.data.items.map((function(t) {
                                            var n = e.formatMessage({ id: "dashboard.node.overview.total" }, { number: t.server_total }),
                                                a = e.formatMessage({ id: "dashboard.node.overview.load" }, { number: t.server_load.toFixed(2) });
                                            return { latLng: [t.lat, t.lng], name: "".concat(t.flag).concat(t.country).concat(t.city, " ").concat(n, " ").concat(a) }
                                        })), s(a), k(!0);
                                    case 10:
                                    case "end":
                                        return t.stop()
                                }
                            }), t)
                        })))()
                    }), []), Object(f["jsxs"])("div", { className: "block block-rounded block-bordered", children: [Object(f["jsx"])("div", { className: "block-header block-header-default", children: Object(f["jsx"])("h3", { className: "block-title", children: e.formatMessage({ id: "dashboard.node.overview" }) }) }), Object(f["jsx"])("div", { className: "block-content block-content-full", children: Object(f["jsx"])("div", { style: { height: 416 }, children: w && Object(f["jsx"])(U["VectorMap"], { map: L["a"], backgroundColor: "#ffffff", regionStyle: { initial: { fill: b, fillOpacity: 1, stroke: "none", strokeWidth: 0, strokeOpacity: 1 }, hover: { fillOpacity: .8, cursor: "pointer" } }, markerStyle: { initial: { fill: h } }, markers: a }) }) })] })
                },
                G = V,
                Y = n("u2Z1"),
                B = n("ET/R"),
                z = s["a"].TabPane,
                H = function() {
                    var e = Object(l["useState"])(),
                        t = Object(c["a"])(e, 2),
                        n = t[0],
                        i = t[1],
                        u = Object(l["useState"])([]),
                        b = Object(c["a"])(u, 2),
                        m = b[0],
                        j = b[1],
                        p = Object(d["h"])("useSubModel"),
                        h = p.initSubState,
                        O = Object(d["g"])();
                    return Object(B["a"])(Object(r["a"])(o.a.mark((function e() {
                        return o.a.wrap((function(e) {
                            while (1) switch (e.prev = e.next) {
                                case 0:
                                    return e.next = 2, h();
                                case 2:
                                case "end":
                                    return e.stop()
                            }
                        }), e)
                    })))), Object(l["useEffect"])((function() {
                        Object(r["a"])(o.a.mark((function e() {
                            var t, n;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(g["k"])({ language: Object(d["b"])() });
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        i(t), n = [], Object.keys(t.data).forEach((function(e) { n = [].concat(Object(a["a"])(n), [e]) })), j(n);
                                    case 9:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []), Object(f["jsxs"])("div", { className: "content content-full", children: [Object(f["jsx"])("div", { className: "row", children: Object(f["jsx"])("div", { className: "col-12 mb-4", children: Object(f["jsx"])(k, {}) }) }), Object(f["jsxs"])("div", { className: "row", children: [Object(f["jsxs"])("div", { className: "order-xl-1 col-xl-4", children: [Object(f["jsx"])(C, {}), Object(f["jsx"])(R, {}), Object(f["jsx"])(A, {})] }), Object(f["jsx"])("div", { className: "col-xl-8", children: Object(f["jsxs"])(s["a"], { defaultActiveKey: "knowledge", size: "large", children: [Object(f["jsx"])(z, { className: "block-title", tab: O.formatMessage({ id: "dashboard.tab.knowledge" }), children: Object(f["jsx"])(Y["a"], { categories: m, knowledges: n }) }, "knowledge"), Object(f["jsx"])(z, { className: "block-title", tab: O.formatMessage({ id: "dashboard.tab.world_overview" }), children: Object(f["jsx"])(G, {}) }, "world"), Object(f["jsx"])(z, { className: "block-title", tab: O.formatMessage({ id: "dashboard.tab.progress_overview" }), children: Object(f["jsx"])(A, {}) }, "Notification")] }) })] })] })
                };
            t["default"] = H
        },
        "5Qn7": function(e, t, n) {
            "use strict";
            n.r(t);
            n("/xke");
            var a = n("TeRw"),
                r = n("k1fw"),
                c = n("9og8"),
                s = n("tJVT"),
                i = n("WmNS"),
                o = n.n(i),
                l = n("q1tI"),
                d = n("X8fG"),
                u = n("r+lG"),
                b = n("L19o"),
                m = n("IS+0"),
                j = n("CLrh"),
                f = n("jPxy"),
                p = n("/YUT"),
                h = n.n(p),
                O = n("9kvl"),
                g = n("55Ip"),
                v = n("T0xp"),
                x = n("pmku"),
                w = n("sqeV"),
                k = n("nKUr"),
                _ = function() {
                    var e, t, n = Object(l["useState"])(),
                        i = Object(s["a"])(n, 2),
                        p = i[0],
                        _ = i[1],
                        y = Object(l["useState"])(!0),
                        N = Object(s["a"])(y, 2),
                        S = N[0],
                        M = N[1],
                        C = Object(l["useState"])(""),
                        T = Object(s["a"])(C, 2),
                        I = T[0],
                        D = T[1],
                        E = Object(l["useState"])(""),
                        R = Object(s["a"])(E, 2),
                        F = R[0],
                        P = R[1],
                        q = Object(l["useState"])(""),
                        A = Object(s["a"])(q, 2),
                        U = A[0],
                        L = A[1],
                        V = Object(l["useRef"])(null),
                        G = Object(l["useRef"])(null),
                        Y = Object(l["useRef"])(null),
                        B = Object(l["useRef"])(null),
                        z = Object(l["useState"])(!1),
                        H = Object(s["a"])(z, 2),
                        K = H[0],
                        W = H[1],
                        J = Object(l["useState"])("emailCode"),
                        X = Object(s["a"])(J, 2),
                        Q = X[0],
                        Z = X[1],
                        $ = Object(O["g"])();
                    void 0 !== O["c"].location.query && (t = "string" === typeof O["c"].location.query.code ? O["c"].location.query.code : void 0);
                    var ee = function() { W(!0) },
                        te = function() { W(!1) },
                        ne = function(e) { D(e) },
                        ae = function(e) { P(e) },
                        re = function(e) {
                            var t;
                            (L(e), W(!1), "emailCode" === Q) && (null === (t = B.current) || void 0 === t || t.triggerClick())
                        },
                        ce = function() {
                            var e = Object(c["a"])(o.a.mark((function e() {
                                var t, n;
                                return o.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            if (Z("emailCode"), null === p || void 0 === p || !p.is_captcha_enable || 0 !== U.length) { e.next = 4; break }
                                            return ee(), e.abrupt("return", !1);
                                        case 4:
                                            return t = { email: I }, U.length > 0 && (t = Object(r["a"])(Object(r["a"])({}, t), {}, { captcha_data: U })), L(""), e.next = 9, Object(j["d"])(t);
                                        case 9:
                                            if (n = e.sent, void 0 !== n) { e.next = 12; break }
                                            return e.abrupt("return", !1);
                                        case 12:
                                            return a["default"].success({ message: $.formatMessage({ id: "common.message.request_success" }), description: $.formatMessage({ id: "common.message.check_samp_box" }) }), e.abrupt("return", !0);
                                        case 14:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }(),
                        se = Object(f["a"])(Object(c["a"])(o.a.mark((function e() {
                            var t, n, c, s, i, l, u, b;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        if (Z("submit"), null === p || void 0 === p || !p.is_captcha_enable || 0 !== U.length) { e.next = 4; break }
                                        return ee(), e.abrupt("return");
                                    case 4:
                                        if (s = null === (t = V.current) || void 0 === t ? void 0 : t.value, i = null === (n = G.current) || void 0 === n ? void 0 : n.value, l = null === (c = Y.current) || void 0 === c ? void 0 : c.value, !(s.length > 0 && i.length > 0 && s !== i)) { e.next = 10; break }
                                        return a["default"].error({ message: $.formatMessage({ id: "common.message.request_error" }), description: $.formatMessage({ id: "common.message.different" }) }), e.abrupt("return");
                                    case 10:
                                        return u = { email: I, email_code: F, password: s, invite_code: l }, U.length > 0 && (u = Object(r["a"])(Object(r["a"])({}, u), {}, { captcha_data: U })), L(""), e.next = 15, Object(j["z"])(u);
                                    case 15:
                                        if (b = e.sent, void 0 !== b) { e.next = 18; break }
                                        return e.abrupt("return");
                                    case 18:
                                        h()(10).then((function() { O["c"].push(d["n"]) }));
                                    case 19:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        }))));
                    return Object(l["useEffect"])((function() {
                        Object(c["a"])(o.a.mark((function e() {
                            var t;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(u["a"])();
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        _(t.data), t.data.tos_url && M(!1);
                                    case 7:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []), Object(k["jsxs"])(k["Fragment"], { children: [Object(k["jsx"])("div", { id: "page-container", children: Object(k["jsx"])("main", { id: "main-container", children: Object(k["jsx"])("div", { className: "bg-image", children: Object(k["jsx"])("div", { className: "row no-gutters justify-content-center", children: Object(k["jsx"])("div", { className: "hero-static col-md-12 d-flex align-items-center v2board-background bg-white", style: d["c"] ? { backgroundImage: "url(".concat(d["c"], ")") } : {}, children: Object(k["jsxs"])("div", { className: "p-3 w-100", children: [Object(k["jsxs"])("div", { className: "mb-3 text-center", children: [Object(k["jsx"])(g["a"], { className: "link-fx text-success font-w700 font-size-h1", to: "/", children: Object(k["jsx"])("span", { className: "text-success", children: d["r"] }) }), Object(k["jsx"])("p", { className: "text-uppercase font-w700 font-size-sm text-muted", children: d["g"] }), Object(k["jsx"])(w["a"], { placement: "bottomCenter" })] }), Object(k["jsx"])("div", { className: "row no-gutters justify-content-center", children: Object(k["jsxs"])("div", { className: "col-sm-8 col-xl-6", children: [Object(k["jsxs"])("div", { className: "py-3", children: [Object(k["jsx"])(b["a"], { onChange: ne, whiteList: null !== (null === p || void 0 === p ? void 0 : p.email_whitelist_suffix) ? null === p || void 0 === p ? void 0 : p.email_whitelist_suffix : void 0 }), (null === p || void 0 === p ? void 0 : p.is_email_verify) && Object(k["jsx"])(m["a"], { onChange: ae, onSend: ce, btnClassName: "btn-success", ref: B }), Object(k["jsx"])("div", { className: "form-group", children: Object(k["jsx"])("input", { ref: V, className: "form-control form-control-lg form-control-alt", placeholder: $.formatMessage({ id: "common.password" }), type: "password" }) }), Object(k["jsx"])("div", { className: "form-group", children: Object(k["jsx"])("input", { ref: G, className: "form-control form-control-lg form-control-alt", placeholder: $.formatMessage({ id: "common.password_repeat" }), type: "password" }) }), Object(k["jsx"])("div", { className: "form-group", children: Object(k["jsx"])("input", { ref: Y, className: "form-control form-control-lg form-control-alt", defaultValue: t, disabled: 8 === (null === (e = t) || void 0 === e ? void 0 : e.length), placeholder: null !== p && void 0 !== p && p.is_invite_force ? $.formatMessage({ id: "register.invite_code" }) : $.formatMessage({ id: "register.invite_code_optional" }) }) }), (null === p || void 0 === p ? void 0 : p.tos_url) && Object(k["jsx"])("div", { className: "form-group", children: Object(k["jsxs"])("div", { className: "custom-control custom-checkbox custom-control-primary", children: [Object(k["jsx"])("input", { type: "checkbox", className: "custom-control-input", id: "signup-terms", onChange: function(e) { M(e.currentTarget.checked) } }), Object(k["jsxs"])("label", { className: "custom-control-label", htmlFor: "signup-terms", children: [$.formatMessage({ id: "register.agree" }), Object(k["jsx"])("a", { href: p.tos_url, target: "_blank", rel: "noopener noreferrer", children: $.formatMessage({ id: "register.terms" }) })] })] }) })] }), Object(k["jsxs"])("div", { className: "form-group", children: [Object(k["jsxs"])("button", { type: "button", className: "btn btn-block btn-hero btn-hero-success", disabled: !S, onClick: function(e) { e.preventDefault(), se() }, children: [Object(k["jsx"])("i", { className: "fa fa-fw fa-plus mr-1" }), $.formatMessage({ id: "common.register" })] }), Object(k["jsxs"])("p", { className: "mt-3 mb-0 d-lg-flex justify-content-lg-between", children: [Object(k["jsxs"])(g["a"], { className: "btn btn-sm btn-light d-block d-lg-inline-block mb-1", to: d["h"], children: [Object(k["jsx"])("i", { className: "fa fa-sign-in-alt text-muted mr-1" }), $.formatMessage({ id: "common.forget_password" })] }), Object(k["jsxs"])(g["a"], { className: "btn btn-sm btn-light d-block d-lg-inline-block mb-1", to: d["n"], children: [Object(k["jsx"])("i", { className: "fa fa-plus text-muted mr-1" }), $.formatMessage({ id: "common.login" })] })] })] })] }) })] }) }) }) }) }) }), (null === p || void 0 === p ? void 0 : p.is_captcha_enable) && 0 === p.captcha_type && Object(k["jsx"])(k["Fragment"], { children: Object(k["jsx"])(v["a"], { onVerified: re, type: Q, sitekey: null === p || void 0 === p ? void 0 : p.recaptcha_site_key, visible: K, onCancel: te }) }), (null === p || void 0 === p ? void 0 : p.is_captcha_enable) && 1 === p.captcha_type && Object(k["jsx"])(k["Fragment"], { children: Object(k["jsx"])(x["a"], { onVerified: re, type: Q, sitekey: null === p || void 0 === p ? void 0 : p.hcaptcha_site_key, visible: K, onCancel: te }) })] })
                };
            t["default"] = _
        },
        "790Q": function(e, t, n) {},
        "861x": function(e, t, n) {},
        "9kvl": function(e, t, n) {
            "use strict";
            n.d(t, "c", (function() { return r["b"] })), n.d(t, "d", (function() { return c["a"] })), n.d(t, "g", (function() { return s["g"] })), n.d(t, "a", (function() { return s["b"] })), n.d(t, "b", (function() { return s["c"] })), n.d(t, "f", (function() { return s["f"] })), n.d(t, "h", (function() { return l["a"] })), n.d(t, "e", (function() { return g }));
            var a, r = n("FfOG"),
                c = n("bCY9"),
                s = n("Fghh"),
                i = (n("jrin"), n("k1fw")),
                o = (n("q1tI"), n("nKUr")),
                l = n("I5X1"),
                d = n("9og8"),
                u = (n("PpiC"), n("WmNS")),
                b = n.n(u),
                m = n("ZqBY"),
                j = n("rlch"),
                f = n("9Baz");
            n("0iz5");
            (function(e) { e[e["SILENT"] = 0] = "SILENT", e[e["WARN_MESSAGE"] = 1] = "WARN_MESSAGE", e[e["ERROR_MESSAGE"] = 2] = "ERROR_MESSAGE", e[e["NOTIFICATION"] = 4] = "NOTIFICATION", e[e["REDIRECT"] = 9] = "REDIRECT" })(a || (a = {}));
            var p, h = "/exception",
                O = function() {
                    var e;
                    if (p) return p;
                    var t = c["a"].applyPlugins({ key: "request", type: j["a"].modify, initialValue: {} }),
                        n = (null === (e = t.errorConfig) || void 0 === e ? void 0 : e.adaptor) || function(e) { return e };
                    p = Object(m["a"])(Object(i["a"])({
                        errorHandler: function(e) {
                            var c, s, i, o;
                            if (null !== e && void 0 !== e && null !== (c = e.request) && void 0 !== c && null !== (s = c.options) && void 0 !== s && s.skipErrorHandler) throw e;
                            if ("ResponseError" === e.name && e.data && e.request) {
                                var l, d = { req: e.request, res: e.response };
                                o = n(e.data, d), e.message = (null === (l = o) || void 0 === l ? void 0 : l.errorMessage) || e.message, e.data = e.data, e.info = o
                            }
                            if (o = e.info, o) {
                                var u, b, m, j = null === (u = o) || void 0 === u ? void 0 : u.errorMessage,
                                    p = null === (b = o) || void 0 === b ? void 0 : b.errorCode,
                                    O = (null === (m = t.errorConfig) || void 0 === m ? void 0 : m.errorPage) || h;
                                switch (null === (i = o) || void 0 === i ? void 0 : i.showType) {
                                    case a.SILENT:
                                        break;
                                    case a.WARN_MESSAGE:
                                        f["message"].warn(j);
                                        break;
                                    case a.ERROR_MESSAGE:
                                        f["message"].error(j);
                                        break;
                                    case a.NOTIFICATION:
                                        f["notification"].open({ description: j, message: p });
                                        break;
                                    case a.REDIRECT:
                                        r["b"].push({ pathname: O, query: { errorCode: p, errorMessage: j } });
                                        break;
                                    default:
                                        f["message"].error(j);
                                        break
                                }
                            } else f["message"].error(e.message || "Request error, please retry.");
                            throw e
                        }
                    }, t)), p.use(function() {
                        var e = Object(d["a"])(b.a.mark((function e(t, a) {
                            var r, c, s, i, o, l, d, u;
                            return b.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, a();
                                    case 2:
                                        if (c = t.req, s = t.res, null === (r = c.options) || void 0 === r || !r.skipErrorHandler) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        if (i = c.options, o = i.getResponse, l = o ? s.data : s, d = n(l, t), !1 !== d.success) { e.next = 16; break }
                                        throw u = new Error(d.errorMessage), u.name = "BizError", u.data = l, u.info = d, u.response = s, u;
                                    case 16:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })));
                        return function(t, n) { return e.apply(this, arguments) }
                    }());
                    var s = t.middlewares || [];
                    s.forEach((function(e) { p.use(e) }));
                    var o = t.requestInterceptors || [],
                        l = t.responseInterceptors || [];
                    return o.map((function(e) { p.interceptors.request.use(e) })), l.map((function(e) { p.interceptors.response.use(e) })), p
                },
                g = function(e, t) { var n = O(); return n(e, t) },
                v = (n("qhky"), function() { return Object(o["jsx"])(o["Fragment"], {}) });
            v.displayName = "INSERT_BLOCK_PLACEHOLDER"
        },
        A8du: function(e, t, n) {
            "use strict";
            n.r(t);
            var a = n("k1fw"),
                r = n("9og8"),
                c = n("WmNS"),
                s = n.n(c),
                i = n("q1tI"),
                o = n("CLrh"),
                l = n("9kvl"),
                d = n("55Ip"),
                u = n("jPxy"),
                b = n("/YUT"),
                m = n.n(b),
                j = n("X8fG"),
                f = n("sqeV"),
                p = n("nKUr"),
                h = function() {
                    var e = Object(l["h"])("@@initialState"),
                        t = e.initialState,
                        n = e.setInitialState,
                        c = Object(i["useRef"])(null),
                        b = Object(i["useRef"])(null),
                        h = Object(l["g"])(),
                        O = function() {
                            var e = Object(r["a"])(s.a.mark((function e() {
                                var r, c;
                                return s.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return e.next = 2, null === t || void 0 === t || null === (r = t.fetchUserInfo) || void 0 === r ? void 0 : r.call(t);
                                        case 2:
                                            c = e.sent, c && n(Object(a["a"])(Object(a["a"])({}, t), {}, { currentUser: c }));
                                        case 4:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }(),
                        g = function() {
                            var e = Object(r["a"])(s.a.mark((function e() {
                                var n;
                                return s.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return e.next = 2, Object(o["b"])();
                                        case 2:
                                            if (n = e.sent, void 0 !== n && void 0 !== n.data) { e.next = 5; break }
                                            return e.abrupt("return");
                                        case 5:
                                            n.data.is_login && (void 0 === (null === t || void 0 === t ? void 0 : t.currentUser) && O(), l["c"].replace("/"));
                                        case 6:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    Object(i["useLayoutEffect"])((function() { g() }), []);
                    var v = function() {
                            m()(10).then((function() {
                                var e = l["c"].location.query,
                                    t = e,
                                    n = t.redirect;
                                window.location.href = n || "/"
                            }))
                        },
                        x = Object(u["a"])(Object(r["a"])(s.a.mark((function e() {
                            var t, n, a, r, i;
                            return s.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return a = null === (t = c.current) || void 0 === t ? void 0 : t.value, r = null === (n = b.current) || void 0 === n ? void 0 : n.value, e.next = 4, Object(o["l"])({ email: a, password: r });
                                    case 4:
                                        if (i = e.sent, !i) { e.next = 10; break }
                                        return j["m"] && localStorage.setItem("auth_data", i.data.auth_data), e.next = 9, O();
                                    case 9:
                                        v();
                                    case 10:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        }))));
                    return Object(p["jsx"])("div", { id: "page-container", children: Object(p["jsx"])("main", { id: "main-container", children: Object(p["jsx"])("div", { className: "row no-gutters bg-primary-op", children: Object(p["jsx"])("div", { className: "hero-static col-md-12 d-flex align-items-center v2board-background bg-white", style: j["c"] ? { backgroundImage: "url(".concat(j["c"], ")") } : {}, children: Object(p["jsxs"])("div", { className: "p-3 w-100", children: [Object(p["jsxs"])("div", { className: "mb-12 text-center", children: [Object(p["jsx"])(d["a"], { className: "link-fx font-w700 font-size-h1", to: "#", onClick: function(e) { e.preventDefault() }, children: Object(p["jsx"])("span", { className: "text-primary", children: j["r"] }) }), Object(p["jsx"])("p", { className: "text-uppercase font-w700 font-size-sm text-muted", children: j["g"] }), Object(p["jsx"])(f["a"], { placement: "bottomCenter" })] }), Object(p["jsx"])("div", { className: "row no-gutters justify-content-center", children: Object(p["jsx"])("div", { className: "col-sm-8 col-xl-6", children: Object(p["jsxs"])("form", { className: "js-validation-signin", onKeyDown: function(e) { "Enter" === e.key && x() }, children: [Object(p["jsxs"])("div", { className: "py-3", children: [Object(p["jsx"])("div", { className: "form-group", children: Object(p["jsx"])("input", { className: "form-control form-control-lg form-control-alt", placeholder: h.formatMessage({ id: "common.email" }), ref: c }) }), Object(p["jsx"])("div", { className: "form-group", children: Object(p["jsx"])("input", { className: "form-control form-control-lg form-control-alt", type: "password", placeholder: h.formatMessage({ id: "common.password" }), ref: b }) })] }), Object(p["jsxs"])("div", { className: "form-group", children: [Object(p["jsxs"])("button", { type: "button", className: "btn btn-block btn-hero btn-hero-primary", onClick: function(e) { e.preventDefault(), x() }, children: [Object(p["jsx"])("i", { className: "fa fa-fw fa-sign-in-alt mr-1", children: " " }), h.formatMessage({ id: "common.login" })] }), Object(p["jsxs"])("p", { className: "mt-3 mb-0 d-lg-flex justify-content-lg-between", children: [Object(p["jsxs"])(d["a"], { className: "btn btn-sm btn-light d-block d-lg-inline-block mb-1", to: j["h"], children: [Object(p["jsx"])("i", { className: "fa fa-exclamation-triangle text-muted mr-1", children: " " }), h.formatMessage({ id: "common.forget_password" })] }), Object(p["jsxs"])(d["a"], { className: "btn btn-sm btn-light d-block d-lg-inline-block mb-1", to: j["p"], children: [Object(p["jsx"])("i", { className: "fa fa-plus text-muted mr-1", children: " " }), h.formatMessage({ id: "common.register" })] })] })] })] }) }) })] }) }) }) }) })
                };
            t["default"] = h
        },
        AQSi: function(e, t, n) {},
        AzOF: function(e, t, n) {
            "use strict";
            n.r(t);
            n("Awhp");
            var a = n("KrTs"),
                r = (n("+BJd"), n("mr32")),
                c = n("9og8"),
                s = n("tJVT"),
                i = (n("g9YV"), n("wCAj")),
                o = n("WmNS"),
                l = n.n(o),
                d = (n("Eah8"), n("q1tI")),
                u = n("CLrh"),
                b = n("9kvl"),
                m = n("55Ip"),
                j = n("X8fG"),
                f = n("wd/R"),
                p = n.n(f),
                h = n("nKUr"),
                O = i["a"].Column,
                g = function() {
                    var e = Object(d["useState"])([]),
                        t = Object(s["a"])(e, 2),
                        n = t[0],
                        o = t[1],
                        f = Object(d["useState"])(0),
                        g = Object(s["a"])(f, 2),
                        v = g[0],
                        x = g[1],
                        w = Object(d["useState"])(1),
                        k = Object(s["a"])(w, 2),
                        _ = k[0],
                        y = k[1],
                        N = Object(d["useState"])(""),
                        S = Object(s["a"])(N, 2),
                        M = S[0],
                        C = S[1],
                        T = 10,
                        I = Object(b["g"])(),
                        D = { pageSize: T, showQuickJumper: !1, showLessItems: !1, showSizeChanger: !1, showTitle: !1, total: v, size: "small" },
                        E = function(e) {
                            if (void 0 !== _) {
                                var t = e.current;
                                y(t)
                            }
                        };
                    Object(d["useEffect"])((function() {
                        Object(c["a"])(l.a.mark((function e() {
                            var t;
                            return l.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(u["t"])({ pageSize: T, current: _ });
                                    case 2:
                                        if (t = e.sent, void 0 !== t && void 0 !== t.data) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        o(t.data), x(t.total);
                                    case 7:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), [M, _]);
                    var R = function() {
                        var e = Object(c["a"])(l.a.mark((function e(t) {
                            var n;
                            return l.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(u["p"])({ trade_no: t });
                                    case 2:
                                        if (n = e.sent, void 0 !== u["p"] && !0 === n.data) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        C(t);
                                    case 6:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })));
                        return function(t) { return e.apply(this, arguments) }
                    }();
                    return Object(h["jsx"])(h["Fragment"], { children: Object(h["jsx"])("div", { className: "content content-full", children: Object(h["jsx"])("div", { className: "block block-rounded block-bordered ", children: Object(h["jsx"])("div", { className: "bg-white", children: Object(h["jsxs"])(i["a"], { rowKey: "trade_no", pagination: D, dataSource: n, scroll: { x: !0 }, bordered: !1, loading: !1, onChange: E, children: [Object(h["jsx"])(O, { title: I.formatMessage({ id: "order.column.trade_no" }), dataIndex: "trade_no", render: function(e) { return Object(h["jsx"])(h["Fragment"], { children: Object(h["jsx"])(m["a"], { to: "/order/".concat(e), children: e }) }) } }, "trade_no"), Object(h["jsx"])(O, { title: I.formatMessage({ id: "order.column.price_name" }), dataIndex: "price_name", render: function(e) { return Object(h["jsx"])(h["Fragment"], { children: e ? Object(h["jsx"])(r["a"], { children: e }) : "-" }) }, responsive: ["lg", "md"] }, "price_name"), Object(h["jsx"])(O, { title: I.formatMessage({ id: "order.column.total_amount" }), dataIndex: "total_amount", align: "center", render: function(e) { return j["f"].format(e / 100) } }, "total_amount"), Object(h["jsx"])(O, { title: I.formatMessage({ id: "order.column.status" }), dataIndex: "status", align: "center", render: function(e) { return Object(h["jsxs"])(h["Fragment"], { children: [0 === e && Object(h["jsx"])(a["a"], { status: "error", text: I.formatMessage({ id: "common.order.status.unpaid" }) }), 1 === e && Object(h["jsx"])(a["a"], { status: "processing", text: I.formatMessage({ id: "common.order.status.pending" }) }), 2 === e && Object(h["jsx"])(a["a"], { status: "default", text: I.formatMessage({ id: "common.order.status.cancelled" }) }), 3 === e && Object(h["jsx"])(a["a"], { status: "success", text: I.formatMessage({ id: "common.order.status.completed" }) })] }) } }, "status"), Object(h["jsx"])(O, { title: I.formatMessage({ id: "common.column.created_at" }), dataIndex: "created_at", align: "center", render: function(e) { return Object(h["jsx"])(h["Fragment"], { children: p.a.unix(e).format("DD/MM/YYYY HH:mm") }) }, responsive: ["lg", "md"] }, "created_at"), Object(h["jsx"])(O, { align: "right", title: I.formatMessage({ id: "common.column.operation" }), render: function(e, t) { return Object(h["jsx"])(h["Fragment"], { children: Object(h["jsx"])("div", { children: Object(h["jsx"])(m["a"], { disabled: 0 !== t.status, to: "#", onClick: function(e) { e.preventDefault(), R(t.trade_no) }, children: I.formatMessage({ id: "order.cancel" }) }) }) }) } })] }) }) }) }) })
                };
            t["default"] = g
        },
        C6Gj: function(e, t, n) {
            "use strict";
            n.r(t);
            n("/xke");
            var a = n("TeRw"),
                r = n("k1fw"),
                c = n("9og8"),
                s = n("tJVT"),
                i = n("WmNS"),
                o = n.n(i),
                l = n("q1tI"),
                d = n("9kvl"),
                u = n("55Ip"),
                b = n("X8fG"),
                m = n("r+lG"),
                j = n("CLrh"),
                f = n("jPxy"),
                p = n("L19o"),
                h = n("IS+0"),
                O = n("T0xp"),
                g = n("pmku"),
                v = n("/YUT"),
                x = n.n(v),
                w = n("sqeV"),
                k = n("nKUr"),
                _ = function() {
                    var e = Object(l["useState"])(""),
                        t = Object(s["a"])(e, 2),
                        n = t[0],
                        i = t[1],
                        v = Object(l["useState"])(""),
                        _ = Object(s["a"])(v, 2),
                        y = _[0],
                        N = _[1],
                        S = Object(l["useState"])(),
                        M = Object(s["a"])(S, 2),
                        C = M[0],
                        T = M[1],
                        I = Object(l["useState"])(!1),
                        D = Object(s["a"])(I, 2),
                        E = D[0],
                        R = D[1],
                        F = Object(l["useState"])(""),
                        P = Object(s["a"])(F, 2),
                        q = P[0],
                        A = P[1],
                        U = Object(l["useRef"])(null),
                        L = Object(l["useRef"])(null),
                        V = Object(d["g"])(),
                        G = function(e) { A(e), R(!1) },
                        Y = function() { R(!0) },
                        B = function() { R(!1) },
                        z = function(e) { i(e) },
                        H = function(e) { N(e) },
                        K = function() {
                            var e = Object(c["a"])(o.a.mark((function e() {
                                var t, c;
                                return o.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            if (null === C || void 0 === C || !C.is_captcha_enable || 0 !== q.length) { e.next = 3; break }
                                            return Y(), e.abrupt("return", !1);
                                        case 3:
                                            return t = { email: n }, q.length > 0 && (t = Object(r["a"])(Object(r["a"])({}, t), {}, { captcha_data: q })), A(""), e.next = 8, Object(j["d"])(t);
                                        case 8:
                                            if (c = e.sent, void 0 !== c) { e.next = 11; break }
                                            return e.abrupt("return", !1);
                                        case 11:
                                            return a["default"].success({ message: V.formatMessage({ id: "common.message.request_success" }), description: V.formatMessage({ id: "common.message.check_samp_box" }) }), e.abrupt("return", !0);
                                        case 13:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }(),
                        W = Object(f["a"])(Object(c["a"])(o.a.mark((function e() {
                            var t, r, c, s, i, l;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        if (c = null === (t = U.current) || void 0 === t ? void 0 : t.value, s = null === (r = L.current) || void 0 === r ? void 0 : r.value, !(c.length > 0 && s.length > 0 && c !== s)) { e.next = 5; break }
                                        return a["default"].error({ message: V.formatMessage({ id: "common.message.request_error" }), description: V.formatMessage({ id: "common.message.different" }) }), e.abrupt("return");
                                    case 5:
                                        return i = { email: n, email_code: y, password: c }, e.next = 8, Object(j["e"])(i);
                                    case 8:
                                        if (l = e.sent, void 0 !== l) { e.next = 11; break }
                                        return e.abrupt("return");
                                    case 11:
                                        x()(10).then((function() { d["c"].push(b["n"]) }));
                                    case 12:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        }))));
                    return Object(l["useEffect"])((function() {
                        Object(c["a"])(o.a.mark((function e() {
                            var t;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(m["a"])();
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        T(t.data);
                                    case 6:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []), Object(k["jsxs"])(k["Fragment"], { children: [Object(k["jsx"])("div", { id: "page-container", className: "side-trans-enabled", children: Object(k["jsx"])("main", { id: "main-container", children: Object(k["jsx"])("div", { className: "row no-gutters bg-gd-sun-op", children: Object(k["jsx"])("div", { className: "hero-static col-md-12 d-flex align-items-center v2board-background bg-white", style: b["c"] ? { backgroundImage: "url(".concat(b["c"], ")") } : {}, children: Object(k["jsxs"])("div", { className: "p-3 w-100", children: [Object(k["jsxs"])("div", { className: "text-center", children: [Object(k["jsx"])(u["a"], { className: "link-fx text-warning font-w700 font-size-h1", to: "/", children: Object(k["jsx"])("span", { className: "text-warning", children: b["r"] }) }), Object(k["jsx"])("p", { className: "text-uppercase font-w700 font-size-sm text-muted", children: b["g"] }), Object(k["jsx"])(w["a"], { placement: "bottomCenter" })] }), Object(k["jsx"])("div", { className: "row no-gutters justify-content-center", children: Object(k["jsxs"])("div", { className: "col-sm-8 col-xl-6", children: [Object(k["jsx"])(p["a"], { onChange: z }), Object(k["jsx"])(h["a"], { onChange: H, onSend: K, btnClassName: "btn-warning" }), Object(k["jsx"])("div", { className: "form-group", children: Object(k["jsx"])("input", { ref: U, type: "password", className: "form-control form-control-lg form-control-alt", placeholder: V.formatMessage({ id: "common.password" }) }) }), Object(k["jsx"])("div", { className: "form-group", children: Object(k["jsx"])("input", { ref: L, type: "password", className: "form-control form-control-lg form-control-alt", placeholder: V.formatMessage({ id: "common.password_repeat" }) }) }), Object(k["jsxs"])("div", { className: "form-group text-center", children: [Object(k["jsxs"])("button", { type: "submit", className: "btn btn-block btn-hero btn-hero-warning", onClick: function(e) { e.preventDefault(), W() }, children: [Object(k["jsx"])("i", { className: "fa fa-fw fa-reply mr-1" }), V.formatMessage({ id: "forget.reset_password_btn" })] }), Object(k["jsxs"])("p", { className: "mt-3 mb-0 d-lg-flex justify-content-lg-between", children: [Object(k["jsxs"])(u["a"], { className: "btn btn-sm btn-light d-block d-lg-inline-block mb-1", to: b["p"], children: [Object(k["jsx"])("i", { className: "fa fa-plus text-muted mr-1" }), V.formatMessage({ id: "common.register" })] }), Object(k["jsxs"])(u["a"], { className: "btn btn-sm btn-light d-block d-lg-inline-block mb-1", to: b["n"], children: [Object(k["jsx"])("i", { className: "fa fa-sign-in-alt text-muted mr-1" }), V.formatMessage({ id: "common.login" })] })] })] })] }) })] }) }) }) }) }), (null === C || void 0 === C ? void 0 : C.is_captcha_enable) && 0 === C.captcha_type && Object(k["jsx"])(k["Fragment"], { children: Object(k["jsx"])(O["a"], { onVerified: G, type: "other", sitekey: null === C || void 0 === C ? void 0 : C.recaptcha_site_key, visible: E, onCancel: B }) }), (null === C || void 0 === C ? void 0 : C.is_captcha_enable) && 1 === C.captcha_type && Object(k["jsx"])(k["Fragment"], { children: Object(k["jsx"])(g["a"], { onVerified: G, type: "other", sitekey: null === C || void 0 === C ? void 0 : C.hcaptcha_site_key, visible: E, onCancel: B }) })] })
                };
            t["default"] = _
        },
        CLrh: function(e, t, n) {
            "use strict";
            n.d(t, "l", (function() { return l })), n.d(t, "b", (function() { return u })), n.d(t, "d", (function() { return m })), n.d(t, "z", (function() { return f })), n.d(t, "e", (function() { return h })), n.d(t, "R", (function() { return g })), n.d(t, "m", (function() { return x })), n.d(t, "n", (function() { return k })), n.d(t, "k", (function() { return y })), n.d(t, "j", (function() { return S })), n.d(t, "x", (function() { return C })), n.d(t, "f", (function() { return I })), n.d(t, "E", (function() { return E })), n.d(t, "F", (function() { return F })), n.d(t, "D", (function() { return q })), n.d(t, "A", (function() { return U })), n.d(t, "C", (function() { return V })), n.d(t, "B", (function() { return Y })), n.d(t, "w", (function() { return z })), n.d(t, "v", (function() { return K })), n.d(t, "c", (function() { return J })), n.d(t, "s", (function() { return Q })), n.d(t, "t", (function() { return $ })), n.d(t, "p", (function() { return te })), n.d(t, "o", (function() { return ae })), n.d(t, "u", (function() { return ce })), n.d(t, "r", (function() { return ie })), n.d(t, "q", (function() { return le })), n.d(t, "i", (function() { return ue })), n.d(t, "g", (function() { return me })), n.d(t, "h", (function() { return fe })), n.d(t, "P", (function() { return he })), n.d(t, "O", (function() { return ge })), n.d(t, "y", (function() { return xe })), n.d(t, "K", (function() { return ke })), n.d(t, "a", (function() { return ye })), n.d(t, "Q", (function() { return Se })), n.d(t, "L", (function() { return Ce })), n.d(t, "H", (function() { return Ie })), n.d(t, "G", (function() { return Ee })), n.d(t, "I", (function() { return Fe })), n.d(t, "J", (function() { return qe })), n.d(t, "N", (function() { return Ue })), n.d(t, "M", (function() { return Ve }));
            var a = n("k1fw"),
                r = n("9og8"),
                c = n("WmNS"),
                s = n.n(c),
                i = n("9kvl"),
                o = n("X8fG");

            function l(e, t) { return d.apply(this, arguments) }

            function d() {
                return d = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/passport/sso/dangnhap", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), d.apply(this, arguments)
            }

            function u(e) { return b.apply(this, arguments) }

            function b() {
                return b = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/passport/sso/kiemtra", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), b.apply(this, arguments)
            }

            function m(e, t) { return j.apply(this, arguments) }

            function j() {
                return j = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/passport/sso/guiEmailDangky", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), j.apply(this, arguments)
            }

            function f(e, t) { return p.apply(this, arguments) }

            function p() {
                return p = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/passport/sso/dangky", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), p.apply(this, arguments)
            }

            function h(e, t) { return O.apply(this, arguments) }

            function O() {
                return O = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/passport/sso/quenmatkhau", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), O.apply(this, arguments)
            }

            function g(e) { return v.apply(this, arguments) }

            function v() {
                return v = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/thongtin", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), v.apply(this, arguments)
            }

            function x(e) { return w.apply(this, arguments) }

            function w() {
                return w = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/dangxuat", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), w.apply(this, arguments)
            }

            function k(e) { return _.apply(this, arguments) }

            function _() {
                return _ = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/thongbao/laydulieu", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), _.apply(this, arguments)
            }

            function y(e, t) { return N.apply(this, arguments) }

            function N() {
                return N = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/huongdan/dulieu", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), N.apply(this, arguments)
            }

            function S(e, t) { return M.apply(this, arguments) }

            function M() {
                return M = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/huongdan/dulieu", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), M.apply(this, arguments)
            }

            function C(e) { return T.apply(this, arguments) }

            function T() {
                return T = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/comm/profileConfig", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), T.apply(this, arguments)
            }

            function I(e) { return D.apply(this, arguments) }

            function D() {
                return D = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/comm/inviteConfig", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), D.apply(this, arguments)
            }

            function E(e) { return R.apply(this, arguments) }

            function R() {
                return R = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/laydulieugoidangky", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), R.apply(this, arguments)
            }

            function F(e) { return P.apply(this, arguments) }

            function P() {
                return P = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/telegram/laydulieuBot", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), P.apply(this, arguments)
            }

            function q(e) { return A.apply(this, arguments) }

            function A() {
                return A = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/getStat", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), A.apply(this, arguments)
            }

            function U(e) { return L.apply(this, arguments) }

            function L() {
                return L = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/resetSecurity", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), L.apply(this, arguments)
            }

            function V(e) { return G.apply(this, arguments) }

            function G() {
                return G = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/server/laydulieuserver", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), G.apply(this, arguments)
            }

            function Y(e) { return B.apply(this, arguments) }

            function B() {
                return B = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/server/tongquanmaychu", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), B.apply(this, arguments)
            }

            function z(e) { return H.apply(this, arguments) }

            function H() {
                return H = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/goidangky/dulieu", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), H.apply(this, arguments)
            }

            function K(e, t) { return W.apply(this, arguments) }

            function W() {
                return W = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/goidangky/dulieu", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), W.apply(this, arguments)
            }

            function J(e, t) { return X.apply(this, arguments) }

            function X() {
                return X = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/magiamgia/kiemtra", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), X.apply(this, arguments)
            }

            function Q(e, t) { return Z.apply(this, arguments) }

            function Z() {
                return Z = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/order/save", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Z.apply(this, arguments)
            }

            function $(e, t) { return ee.apply(this, arguments) }

            function ee() {
                return ee = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/donhang/laydulieu", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), ee.apply(this, arguments)
            }

            function te(e, t) { return ne.apply(this, arguments) }

            function ne() {
                return ne = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/order/cancel", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), ne.apply(this, arguments)
            }

            function ae(e, t) { return re.apply(this, arguments) }

            function re() {
                return re = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/donhang/chitiet", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), re.apply(this, arguments)
            }

            function ce(e) { return se.apply(this, arguments) }

            function se() {
                return se = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/order/getPaymentMethod", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), se.apply(this, arguments)
            }

            function ie(e, t) { return oe.apply(this, arguments) }

            function oe() {
                return oe = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/order/checkout", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), oe.apply(this, arguments)
            }

            function le(e, t) { return de.apply(this, arguments) }

            function de() {
                return de = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/order/check", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), de.apply(this, arguments)
            }

            function ue(e) { return be.apply(this, arguments) }

            function be() {
                return be = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/invite/fetch", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), be.apply(this, arguments)
            }

            function me(e) { return je.apply(this, arguments) }

            function je() {
                return je = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/invite/save", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), je.apply(this, arguments)
            }

            function fe(e, t) { return pe.apply(this, arguments) }

            function pe() {
                return pe = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/invite/details", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), pe.apply(this, arguments)
            }

            function he(e, t) { return Oe.apply(this, arguments) }

            function Oe() {
                return Oe = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/transferCommissionBalance", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Oe.apply(this, arguments)
            }

            function ge(e, t) { return ve.apply(this, arguments) }

            function ve() {
                return ve = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/transferBalance", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), ve.apply(this, arguments)
            }

            function xe(e, t) { return we.apply(this, arguments) }

            function we() {
                return we = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/recharge", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), we.apply(this, arguments)
            }

            function ke(e, t) { return _e.apply(this, arguments) }

            function _e() {
                return _e = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/ticket/withdraw", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), _e.apply(this, arguments)
            }

            function ye(e, t) { return Ne.apply(this, arguments) }

            function Ne() {
                return Ne = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/changePassword", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Ne.apply(this, arguments)
            }

            function Se(e, t) { return Me.apply(this, arguments) }

            function Me() {
                return Me = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/update", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Me.apply(this, arguments)
            }

            function Ce(e) { return Te.apply(this, arguments) }

            function Te() {
                return Te = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/hotro/laydulieu", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Te.apply(this, arguments)
            }

            function Ie(e, t) { return De.apply(this, arguments) }

            function De() {
                return De = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/ticket/close", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), De.apply(this, arguments)
            }

            function Ee(e, t) { return Re.apply(this, arguments) }

            function Re() {
                return Re = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/hotro/laydulieu", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Re.apply(this, arguments)
            }

            function Fe(e, t) { return Pe.apply(this, arguments) }

            function Pe() {
                return Pe = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/ticket/reply", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Pe.apply(this, arguments)
            }

            function qe(e, t) { return Ae.apply(this, arguments) }

            function Ae() {
                return Ae = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/ticket/save", Object(a["a"])({ method: "POST", headers: { "Content-Type": o["a"] }, data: t }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Ae.apply(this, arguments)
            }

            function Ue(e, t) { return Le.apply(this, arguments) }

            function Le() {
                return Le = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/Logdulieukhachhang", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Le.apply(this, arguments)
            }

            function Ve(e, t) { return Ge.apply(this, arguments) }

            function Ge() {
                return Ge = Object(r["a"])(s.a.mark((function e(t, n) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/user/bandodulieu", Object(a["a"])({ method: "GET", params: Object(a["a"])({}, t) }, n || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), Ge.apply(this, arguments)
            }
            n("r+lG")
        },
        Eah8: function(e, t, n) {},
        FfOG: function(e, t, n) {
            "use strict";
            n.d(t, "a", (function() { return s })), n.d(t, "b", (function() { return c }));
            var a = n("YS25"),
                r = { basename: "/" };
            window.routerBase && (r.basename = window.routerBase);
            var c = Object({ NODE_ENV: "production" }).__IS_SERVER ? null : Object(a["b"])(r),
                s = function() { var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0]; return e || (c = Object(a["b"])(r)), c }
        },
        Fghh: function(e, t, n) {
            "use strict";
            n.d(t, "a", (function() { return u["b"] })), n.d(t, "g", (function() { return b["a"] })), n.d(t, "d", (function() { return h })), n.d(t, "b", (function() { return O })), n.d(t, "e", (function() { return g })), n.d(t, "c", (function() { return v })), n.d(t, "f", (function() { return x }));
            var a, r = n("k1fw"),
                c = n("BK0h"),
                s = n("rlch"),
                i = n("ZW6p"),
                o = n("tytk"),
                l = n.n(o),
                d = n("bCY9"),
                u = n("zSVi"),
                b = n("52Oh"),
                m = { "common.login": "Login", "common.logout": "Logout", "common.back_home": "Back to Login", "common.email": "Email", "common.email_code": "Email verification code", "common.password": "Password", "common.password_repeat": "Password", "common.forget_password": "Forgot password", "common.register": "Register", "common.send": "Send", "common.message.request_error": "Request failed", "common.message.request_success": "Request successed", "common.message.request_network_error": "Network exception", "common.message.reqeust_network_error.desc": "You can't connect to the server", "common.message.check_samp_box": "If you do not receive the verification code, please check the spam box", "common.message.different": "The two passwords are different", "common.message.copy_success": "Copy succeeded", "common.column.created_at": "Creation Time", "common.column.operation": "Action", "common.table.no_data": "No Data", "common.order.status.unpaid": "Pending Payment", "common.order.status.pending": "Opening Active", "common.order.status.cancelled": "Cancelled", "common.order.status.completed": "Completed", "module.plan": "Purchase Subscription", "module.subscribe": "My Subscription", "module.dashboard": "Dashboard", "module.knowledge": "Knowledge Base", "module.order": "My Orders", "module.invite": "My Invitation", "module.profile": "User Center", "module.ticket": "My Tickets", "module.traffic": "Transfer Data Details", "module.group.subscription": "SUBSCRIPTION", "module.group.billing": "BILLING", "module.group.account": "ACCOUNT", "modal.qrcode.waiting": "Waiting for payment", "modal.telegram.got_it": "I got it", "modal.telegram.first_step": "First Step", "modal.telegram.second_step": "Second Step", "modal.telegram.search": "Open {name} and Search", "modal.telegram.send_bot": "Send the following command to bot", "modal.telegram.bind": "Link to {name}", "modal.ticket.create_success": "Create ticket success", "modal.ticket.title": "New Ticket", "modal.ticket.subject": "Subject", "modal.ticket.enter_jubject": "Please enter a subject", "modal.ticket.level": "Ticket Priority", "modal.ticket.enter_level": "Please select the ticket priority", "modal.ticket.level.low": "Low", "modal.ticket.level.medium": "Medium", "modal.ticket.level.high": "High", "modal.ticket.message": "Message", "modal.ticket.enter_message": "Please describe the problem you encountered", "modal.wallet.recharge.title": "Recharge", "modal.wallet.recharge.tip": "Single recharge amount range ({minRechargeAmount} - {maxRechargeAmount})", "modal.wallet.recharge.amount": "Recharge amount", "modal.wallet.recharge.enter_amount": "Please enter the amount to be recharged", "modal.wallet.transfer.title": "Transfer", "modal.wallet.transfer.tab.commission_balance": "Transfer Invitation Commission to Account Balance", "modal.wallet.transfer.tab.balance": "Balance Transfer", "modal.wallet.transfer.tip": "The transferred balance is only used for platform consumption", "modal.wallet.transfer.message.success": "Transfer succeeded", "modal.wallet.transfer_commission_balance.current_total": "Current invitation balance", "modal.wallet.transfer_commission_balance.amount": "Transfer amount", "modal.wallet.transfer_commission_balance.enter_amount": "Please enter the amount to be transferred", "modal.wallet.transfer_balance.current_total": "Current balance", "modal.wallet.transfer_balance.user_email": "User Email", "modal.wallet.transfer_balance.amount": "Transfer amount", "modal.wallet.transfer_balance.enter_user_email": "Please enter the email address of the user", "modal.wallet.transfer_balance.enter_amount": "Please enter the amount to be transferred", "modal.wallet.wallet.withdrawal.title": "Apply For Withdrawal", "modal.wallet.wallet.withdrawal.method": "Withdrawal Method", "modal.wallet.wallet.withdrawal.enter_method": "Please seleect a withdrawal method", "modal.wallet.wallet.withdrawal.account": "Withdrawal Account", "modal.wallet.wallet.withdrawal.enter_account": "Please enter the withdrawal account", "subscribe.oneclick.copy_url": "Copy Subscription URL", "subscribe.oneclick.view_qrcode": "Subscribe to QR Code", "subscribe.oneclick.copy_btn": "Copy SubScription", "subscribe.oneclick.btn": "Quick Subscription", "subscribe.oneclick.export": "Export to {name}", "subscribe.summary.not_expired": "The subscription is valid for unlimited time", "subscribe.summary.expired": "Expired", "subscribe.summary.expire_tip": "Will expire on {expiredDay}\uff0c{leftDay} days before expiration\uff0cafter {resetDay} days reset transfer data", "subscribe.summary.expire_tip_not_reset": "Will expire on {expiredDay}\uff0c{leftDay} days before expiration", "subscribe.summary.expire_hour_tip": "Will expire on {expiredDay}\uff0c{leftHour} hours before expiration", "subscribe.summary.stats": "{usedTraffic} Used / Total {transferTotal}", "invite.generated": "generated", "invite.list.title": "Invitation Details", "invite.list.column.updated_at": "Complete Time", "invite.list.column.total_amount": "Order Amount", "invite.list.column.commission_rate": "Commission Rate", "invite.list.column.commission_balance": "Commission", "invite.list.column.commission_status": "Commission Status", "invite.list.column.commission_status.new": "Confirming", "invite.list.column.commission_status.pending": "Pending", "invite.list.column.commission_status.valid": "Completed", "invite.list.column.commission_status.invalid": "Invalid", "invite.manager.title": "Invitation Code Management", "invite.mangaer.generate_btn": "Generate invitation code", "invite.manager.column.invite_code": "Invitation Code", "invite.manager.copy_link": "Copy Link", "invite.stat.registerd": "REGISTERED USERS", "invite.stat.commission_rate": "COMMISSION RATE", "invite.stat.commission_pending_balance": "PENDING COMMISSION", "invite.stat.commission_pending_balance.tip": "The commission will reach your commission account after review.", "register.invite_code": "Invitation code", "register.invite_code_optional": "Invitation code (Optional)", "register.agree": "I have read and agree to", "register.terms": "the terms of service", "forget.reset_password_btn": "RESET PASSWORD", "dashboard.tab.world_overview": "Node Information", "dashboard.tab.knowledge": "Beginner tutorials", "dashboard.node.overview": "Node Overview", "dashboard.node.overview.total": "Number of nodes:{number}", "dashboard.node.overview.load": "Node load:{number}", "dashboard.notice.announcement": "ANNOUNCEMENTS", "dashboard.subscribe.renew": "Renew", "dashboard.subscribe.purchase": "Purchase", "dashboard.subscribe.view_subscription": "View Subscription", "dashboard.event.bind_telegram": "Not link to Telegram yet", "dashboard.event.click_bind": "Please click here to link to Telegram", "dashboard.event.unpaid_orders": "There are still unpaid orders", "dashboard.event.pay_now": "Pay now", "dashboard.event.view_now": "View now", "dashboard.event.open_ticket": "{number} Ticket is being processed ", "dashboard.event.suspend": "You have been suspended from the system, recovery time: {time}", "dashboard.event.nothing": "No events", "dashboard.event.pending": "To do event", "knowledge.last_update": "Last update", "knowledge.lock.title": "You need to purchase a subscription to view", "knowledge.lock.btn": "Subscribe now", "order.cancel": "Canel", "order.column.trade_no": "#No.", "order.column.price_name": "Type / Cycle", "order.column.total_amount": "Amount", "order.column.status": "Status", "order.detail.status.pending.subtitle": "The order system is processing, please wait 1-3 minutes.", "order.detail.status.completed.subtitle": "The order has been paid and opened.", "order.detail.status.cancelled.subtitle": "The order has been cancelled due to overtime payment.", "order.detail.messager.info": "Going to the cashier", "order.detail.title": "Order Details", "order.detail.payment_method": "Payment Method", "order.detail.plan_title": "Product information", "order.detail.plan_name": "Product name", "order.detail.price_name": "Type/Period", "order.detail.plan_transter_enable": "Product flow", "order.detail.order_title": "Order infomation", "order.detail.order_close_btn": "close order", "order.detail.order_trade_no": "Order number", "order.detail.order_callback_no": "Callback number", "order.detail.order_discount_amount": "Discount amount", "order.detail.order_balance_payment": "Balance payment", "order.detail.order_paid_at": "Payment time", "order.detail.operation.total": "Order Total", "order.detail.operation.discount": "Discount", "order.detail.operation.amount_to": "Total", "order.detail.operation.check_out": "Checkout", "subscribe.renew": "Renew", "subscribe.purchase": "Purchase", "subscribe.renew_info": "No access points available, if you have not subscribed a subscription or the subscription has been expired, please", "subscribe.top.operation.reset_traffic": "Reset Current Transfer Data", "subscribe.top.operation.reset_traffic.title": "Are you sure to reset the current month's transfer data?", "subscribe.top.operation.reset_traffic.content": 'Click "Confirm" and you will be redirected to the payment page. After the order is paid, the system will clear your used data for the month.', "subscribe.top.operation.reset_private": "Reset Subscription", "subscribe.top.operation.reset_private.title": "Are you sure to reset subscription?", "subscribe.top.operation.reset_private.content": "In case of account information or your subscription leak this option is used to reset your UUID and subscription will be changed after reset, you need to re-subscribe.", "subscribe.top.operation.reset_private.messages.success": "Successfully reset subscription information", "subscribe.list.title": "Node status", "subscribe.list.column.name": "Name", "subscribe.list.column.status": "Status", "subscribe.list.column.status.tip": "Access Point online status in the last 5 minutes", "subscribe.list.column.rate": "Rate", "subscribe.list.column.rate.tip": "The transfer data used is multiplied by the transfer data rate deducted", "subscribe.list.column.tags": "Tags", "ticket.history": "Tickets history", "ticket.new_btn": "New Ticket", "ticket.column.subject": "Subject", "ticket.column.level": "Ticket Priority", "ticket.column.level.low": "Low", "ticket.column.level.medium": "Medium", "ticket.column.level.high": "High", "ticket.column.status": "Ticket Status", "ticket.column.status.not_reply": "Pending Reply", "ticket.column.updated_at": "Last Reply", "ticket.column.status.closed": "Closed", "ticket.column.operation.close": "Close", "ticket.detail.enter_message": "Please enter to reply to the ticket...", "traffic.heatmap.title": "Flow Heat Map", "traffic.list.title": "Flow Details", "traffic.column.log_at": "Record Time", "traffic.column.n": "Number of requests", "traffic.column.u": "Actual Upload", "traffic.column.d": "Actual Download", "traffic.column.total": "Total", "traffic.column.total.tip": "Formula: (Actual Upload + Actual Download) = Deduct Transfer Data", "profile.telegram.bind": "Link to{name}", "profile.telegram.start_btn": "Start Now", "profile.telegram.discuss_group": "Telegram discuss", "profile.telegram.join_now": "Join now", "profile.wallet.title": "My Wallet", "profile.wallet.tip": "Wallet Details", "profile.wallet.tip.balance": "Account Balance (For billing only)", "profile.wallet.tip.commission_balance": "Invitation Commission (Can be used to withdraw)", "profile.wallet.withdrawal_btn": "Invitation Commission Withdrawal", "profile.wallet.transfer_btn": "Transfer", "profile.wallet.recharge_btn": "Recharge", "profile.reset.reset_btn": "Reset", "profile.reset.reset_private": "Reset Subscription", "profile.reset.reset_private.title": "Do you want to reset subscription?", "profile.reset.reset_private.content": "In case of account information or your subscription leak this option is used to reset your UUID and subscription will be changed after reset, you need to re-subscribe.", "profile.setting.notice": "Notification", "profile.setting.remind_expire": "Subscription expiration email reminder", "profile.setting.remind_traffic": "Traffic usage reminder", "profile.password.message.password_diffrent": "Two new passwords entered do not match", "profile.password.message.change_success": "Password modified successfully", "profile.password.title": "Change Password", "profile.password.save_btn": "Save", "profile.password.old_password": "Old Password", "profile.password.new_password": "New Password", "profile.password.enter_old_password": "Please enter the old password", "profile.password.enter_new_password": "Please enter the new password", "profile.password.enter_repeat_password": "Please enter the new password again", "plan.now": "SUBSCRIBE NOEW", "plan.detail.title": "Configure subscription", "plan.detail.cycle": "Payment Cycle", "plan.detail.select_other_btn.title": "The subscription cannot be renewed", "plan.detail.select_other_btn": "Select another subscription", "plan.detail.operation.discount": "Discount", "plan.detail.operation.total": "Order Total", "plan.detail.operation.modal.title": "Attention subscription changes", "plan.detail.operation.modal.content": "Attention please, changing subscription will overwrite your current subscription.", "plan.detail.operation.amount_to": "Total", "plan.detail.operation.check_out": "Order", "plan.detail.coupon.check_btn": "Verify", "plan.detail.coupon.enter_coupon": "Have coupons\uff1f" },
                j = { "common.login": "\u0110\u0103ng nh\xe2\u0323p", "common.logout": "\u0110\u0103ng xu\xe2\u0301t", "common.back_home": "Quay la\u0323i \u0111\u0103ng nh\xe2\u0323p", "common.email": "Email", "common.email_code": "Ma\u0303 xa\u0301c minh Email", "common.password": "M\xe2\u0323t kh\xe2\u0309u", "common.password_repeat": "Nh\xe2\u0323p la\u0323i m\xe2\u0323t kh\xe2\u0309u", "common.forget_password": "Qu\xean m\xe2\u0323t kh\xe2\u0309u", "common.register": "\u0110\u0103ng ky\u0301", "common.send": "G\u01b0\u0309i \u0111i", "common.message.request_error": "Y\xeau c\xe2\u0300u th\xe2\u0301t ba\u0323i", "common.message.request_success": "Y\xeau c\xe2\u0300u tha\u0300nh c\xf4ng", "common.message.request_network_error": "L\xf4\u0303i k\xea\u0301t n\xf4\u0301i", "common.message.reqeust_network_error.desc": "Ba\u0323n kh\xf4ng th\xea\u0309 k\xea\u0301t n\xf4\u0301i t\u01a1\u0301i ma\u0301y chu\u0309", "common.message.check_samp_box": "N\xea\u0301u ba\u0323n kh\xf4ng nh\xe2\u0323n \u0111\u01b0\u01a1\u0323c ma\u0303 xa\u0301c minh, vui lo\u0300ng ki\xea\u0309m tra h\xf4\u0323p th\u01b0 ra\u0301c", "common.message.different": "Hai m\xe2\u0323t kh\xe2\u0309u kh\xf4ng tru\u0300ng kh\u01a1\u0301p", "common.message.copy_success": "Sao che\u0301p tha\u0300nh c\xf4ng", "common.column.created_at": "Th\u01a1\u0300i gian kh\u01a1\u0309i ta\u0323o", "common.column.operation": "Thao ta\u0301c", "common.table.no_data": "Kh\xf4ng co\u0301 d\u01b0\u0303 li\xea\u0323u", "common.order.status.unpaid": "\u0110ang ch\u01a1\u0300 thanh toa\u0301n", "common.order.status.pending": "\u0110ang \u0111\u01b0\u01a1\u0323c ki\u0301ch hoa\u0323t", "common.order.status.cancelled": "\u0110a\u0303 hu\u0309y", "common.order.status.completed": "Hoa\u0300n tha\u0300nh", "module.plan": "Mua go\u0301i di\u0323ch vu\u0323", "module.subscribe": "Go\u0301i di\u0323ch vu\u0323 cu\u0309a t\xf4i", "module.dashboard": "Trang ch\u1ee7", "module.knowledge": "Ho\u0309i \u0111a\u0301p & H\u01b0\u01a1\u0301ng d\xe2\u0303n", "module.order": "\u0110\u01a1n ha\u0300ng cu\u0309a t\xf4i", "module.invite": "Ch\u01b0\u01a1ng tri\u0300nh CTV", "module.profile": "Th\xf4ng tin ng\u01b0\u01a1\u0300i du\u0300ng", "module.ticket": "H\xf4\u0303 tr\u01a1\u0323", "module.traffic": "Chi ti\xea\u0301t s\u01b0\u0309 du\u0323ng", "module.group.subscription": "GO\u0301I DI\u0323CH VU\u0323", "module.group.billing": "HO\u0301A \u0110\u01a0N", "module.group.account": "NG\u01af\u01a0\u0300I DU\u0300NG", "modal.qrcode.waiting": "\u0110ang ch\u01a1\u0300 thanh toa\u0301n", "modal.telegram.got_it": "T\xf4i \u0111a\u0303 hi\xea\u0309u", "modal.telegram.first_step": "B\u01b0\u01a1\u0301c \u0111\xe2\u0300u ti\xean", "modal.telegram.second_step": "B\u01b0\u01a1\u0301c th\u01b0\u0301 hai", "modal.telegram.search": "M\u01a1\u0309 {name} va\u0300 ti\u0300m", "modal.telegram.send_bot": "G\u01b0\u0309i cho bot", "modal.telegram.bind": "Th\xeam {name}", "modal.ticket.create_success": "Ta\u0323o ticket h\xf4\u0303 tr\u01a1\u0323 tha\u0300nh c\xf4ng", "modal.ticket.title": "Ticket h\xf4\u0303 tr\u01a1\u0323 m\u01a1\u0301i", "modal.ticket.subject": "Chu\u0309 \u0111\xea\u0300", "modal.ticket.enter_jubject": "Vui lo\u0300ng nh\xe2\u0323p ti\xeau \u0111\xea\u0300 tin nh\u0103\u0301n", "modal.ticket.level": "M\u01b0\u0301c \u0111\xf4\u0323", "modal.ticket.enter_level": "Vui lo\u0300ng cho\u0323n c\xe2\u0301p \u0111\xf4\u0323 tin nh\u0103\u0301n", "modal.ticket.level.low": "Th\xe2\u0301p", "modal.ticket.level.medium": "Trung bi\u0300nh", "modal.ticket.level.high": "Cao", "modal.ticket.message": "N\xf4\u0323i dung tin nh\u0103\u0301n", "modal.ticket.enter_message": "M\xf4 ta\u0309 v\xe2\u0301n \u0111\xea\u0300 ba\u0323n g\u0103\u0323p pha\u0309i", "modal.wallet.recharge.title": "N\u1ea1p ti\u1ec1n", "modal.wallet.recharge.tip": "Ph\u1ea1m vi s\u1ed1 ti\u1ec1n n\u1ea1p ({minRechargeAmount} - {maxRechargeAmount})", "modal.wallet.recharge.amount": "S\u1ed1 ti\u1ec1n n\u1ea1p", "modal.wallet.recharge.enter_amount": "Vui l\xf2ng nh\u1eadp s\u1ed1 ti\u1ec1n b\u1ea1n c\u1ea7n n\u1ea1p", "modal.wallet.transfer.title": "Chuy\u1ec3n kho\u1ea3n", "modal.wallet.transfer.tab.commission_balance": "Chuy\u1ec3n ti\u1ec1n hoa h\u1ed3ng sang v\xed ch\xednh", "modal.wallet.transfer.tab.balance": "Chuy\u1ec3n kho\u1ea3n s\u1ed1 d\u01b0", "modal.wallet.transfer_commission_balance.tip": "Sau khi chuy\xea\u0309n \u0111\xf4\u0309i sang ta\u0300i khoa\u0309n, ti\xea\u0300n na\u0300y chi\u0309 du\u0300ng \u0111\xea\u0309 mua go\u0301i di\u0323ch vu\u0323 cu\u0309a chu\u0301ng t\xf4i.", "modal.wallet.transfer.message.success": "Chuy\u1ec3n th\xe0nh c\xf4ng", "modal.wallet.transfer_commission_balance.current_total": "S\xf4\u0301 d\u01b0 ta\u0300i khoa\u0309n hoa h\xf4\u0300ng", "modal.wallet.transfer_commission_balance.amount": "S\xf4\u0301 ti\xea\u0300n mu\xf4\u0301n \u0111\u1ed5i", "modal.wallet.transfer_commission_balance.enter_amount": "Vui lo\u0300ng nh\xe2\u0323p s\xf4\u0301 ti\xea\u0300n ba\u0323n mu\xf4\u0301n \u0111\xf4\u0309i sang ta\u0300i khoa\u0309n ch\xednh", "modal.wallet.transfer_balance.current_total": "S\u1ed1 d\u01b0 hi\u1ec7n t\u1ea1i", "modal.wallet.transfer_balance.user_email": "Email ng\u01b0\u1eddi d\xf9ng", "modal.wallet.transfer_balance.amount": "S\u1ed1 ti\u1ec1n mu\u1ed1n chuy\u1ec3n", "modal.wallet.transfer_balance.enter_amount": "Vui l\xf2ng nh\u1eadp s\u1ed1 ti\u1ec1n c\u1ea7n chuy\u1ec3n", "modal.wallet.transfer_balance.enter_user_email": "Vui l\xf2ng nh\u1eadp \u0111\u1ecba ch\u1ec9 email c\u1ee7a ng\u01b0\u1eddi d\xf9ng", "modal.wallet.wallet.withdrawal.title": "\u0110\u0103ng ky\u0301 ru\u0301t ti\xea\u0300n", "modal.wallet.wallet.withdrawal.method": "Ph\u01b0\u01a1ng th\u01b0\u0301c ru\u0301t ti\xea\u0300n", "modal.wallet.wallet.withdrawal.enter_method": "Cho\u0323n hi\u0300nh th\u01b0\u0301c ru\u0301t ti\xea\u0300n", "modal.wallet.wallet.withdrawal.account": "Ta\u0300i khoa\u0309n ru\u0301t ti\xea\u0300n", "modal.wallet.wallet.withdrawal.enter_account": "Vui lo\u0300ng \u0111i\xea\u0300n ta\u0300i khoa\u0309n ru\u0301t ti\xea\u0300n", "subscribe.oneclick.copy_url": "Sao che\u0301p li\xean k\xea\u0301t", "subscribe.oneclick.copy_clash_url": "Sao ch\xe9p li\xean k\u1ebft \u0111\u0103ng k\xfd (ch\u1ec9 d\xe0nh cho Clash)", "subscribe.oneclick.view_qrcode": "Ta\u0323o ma\u0303 QR Code", "subscribe.oneclick.copy_btn": "Sao che\u0301p Subscription", "subscribe.oneclick.btn": "Nh\xe2\u0301p va\u0300o \u0111\xe2y \u0111\xea\u0309 \u0111\xf4\u0300ng b\xf4\u0323 ma\u0301y chu\u0309", "subscribe.oneclick.export": "Chuy\xea\u0309n \u0111\xea\u0301n {name}", "subscribe.summary.not_expired": "Go\u0301i di\u0323ch vu\u0323 co\u0301 gia\u0301 tri\u0323 kh\xf4ng th\u01a1\u0300i ha\u0323n", "subscribe.summary.expired": "H\xea\u0301t ha\u0323n", "subscribe.summary.expire_tip": "H\xea\u0301t ha\u0323n va\u0300o nga\u0300y {expiredDay}\uff0cco\u0300n {leftDay} nga\u0300y\uff0csau {resetDay} nga\u0300y dung l\u01b0\u01a1\u0323ng se\u0303 \u0111\u01b0\u01a1\u0323c la\u0300m m\u01a1\u0301i.", "subscribe.summary.expire_tip_not_reset": "H\xea\u0301t ha\u0323n va\u0300o nga\u0300y {expiredDay}\uff0cco\u0300n {leftDay} nga\u0300y", "subscribe.summary.expire_hour_tip": "H\xea\u0301t ha\u0323n va\u0300o nga\u0300y {expiredDay}\uff0cco\u0300n {leftHour} gi\u1edd", "subscribe.summary.stats": "\u0110a\u0303 s\u01b0\u0309 du\u0323ng {usedTraffic} / T\xf4\u0309ng dung l\u01b0\u01a1\u0323ng {transferTotal}", "invite.generated": "Ta\u0323o ma\u0303 tha\u0300nh c\xf4ng!", "invite.list.title": "Chi ti\xea\u0301t", "invite.list.column.updated_at": "Th\u01a1\u0300i gian hoa\u0300n tha\u0300nh", "invite.list.column.total_amount": "S\u1ed1 l\u01b0\u1ee3ng \u0111\u01a1n \u0111\u1eb7t h\xe0ng", "invite.list.column.commission_rate": "T\u1ef7 l\u1ec7 hoa h\u1ed3ng", "invite.list.column.commission_balance": "Ti\xea\u0300n hoa h\xf4\u0300ng", "invite.list.column.commission_status": "Tra\u0323ng tha\u0301i ti\xea\u0300n hoa h\xf4\u0300ng", "invite.list.column.commission_status.new": "Xa\u0301c nh\xe2\u0323n", "invite.list.column.commission_status.pending": "Ch\u01b0a gia\u0309i quy\xea\u0301t", "invite.list.column.commission_status.valid": "Hoa\u0300n tha\u0300nh", "invite.list.column.commission_status.invalid": "Kh\xf4ng h\u01a1\u0323p l\xea\u0323", "invite.manager.title": "Qua\u0309n ly\u0301 ma\u0303 gi\u01a1\u0301i thi\xea\u0323u", "invite.mangaer.generate_btn": "Ta\u0323o ma\u0303 gi\u01a1\u0301i thi\xea\u0323u", "invite.manager.column.invite_code": "Ma\u0303 ng\u01b0\u01a1\u0300i gi\u01a1\u0301i thi\xea\u0323u", "invite.manager.copy_link": "Sao che\u0301p li\xean k\xea\u0301t", "invite.stat.registerd": "S\xd4\u0301 L\u01af\u01a0\u0323NG NG\u01af\u01a0\u0300I DU\u0300NG \u0110A\u0303 \u0110\u0102NG KY\u0301", "invite.stat.commission_rate": "PH\xc2\u0300N TR\u0102M HOA H\xd4\u0300NG \u0110\u01af\u01a0\u0323C H\u01af\u01a0\u0309NG", "invite.stat.commission_pending_balance": "TI\xca\u0300N HOA H\xd4\u0300NG \u0110ANG \u0110\u01af\u01a0\u0323C XA\u0301C NH\xc2\u0323N", "invite.stat.commission_pending_balance.tip": "Ti\xea\u0300n hoa h\xf4\u0300ng se\u0303 \u0111\u01b0\u01a1\u0323c chuy\xea\u0309n \u0111\xea\u0301n ta\u0300i khoa\u0309n cu\u0309a ba\u0323n sau khi xem xe\u0301t xong.", "invite.stat.invite_package_total_values": "Ph\u1ea7n tr\u0103m hoa h\u1ed3ng", "register.invite_code": "Ma\u0303 gi\u01a1\u0301i thi\xea\u0323u", "register.invite_code_optional": "Ma\u0303 gi\u01a1\u0301i thi\xea\u0323u (N\xea\u0301u co\u0301)", "register.agree": " T\xf4i \u0111a\u0303 \u0111o\u0323c va\u0300 \u0111\xf4\u0300ng y\u0301 ", "register.terms": "\u0111i\xea\u0300u khoa\u0309n di\u0323ch vu\u0323", "forget.reset_password_btn": "\u0110\u0102\u0323T LA\u0323I M\xc2\u0323T KH\xc2\u0309U", "dashboard.tab.world_overview": "Tr\u1ea1ng th\xe1i m\xe1y ch\u1ee7", "dashboard.tab.progress_overview": "Ti\u1ebfn tr\xecnh m\xe1y ch\u1ee7", "dashboard.tab.knowledge": "H\u01b0\u1edbng d\u1eabn cho ng\u01b0\u1eddi m\u1edbi b\u1eaft \u0111\u1ea7u", "dashboard.node.overview": "Th\xf4ng tin m\xe1y ch\u1ee7", "dashboard.node.overview.total": "M\xe1y ch\u1ee7: {number}", "dashboard.node.overview.load": "T\u1ea3i h\u1ec7 th\u1ed1ng: {number}", "dashboard.notice.announcement": "TH\xd4NG BA\u0301O", "dashboard.subscribe.purchase": "Mua ngay", "dashboard.subscribe.renew": "Gia ha\u0323n", "dashboard.subscribe.view_subscription": "Xem go\u0301i di\u0323ch vu\u0323", "dashboard.event.bind_telegram": "Ch\u01b0a th\xeam li\xean k\xea\u0301t Telegram", "dashboard.event.click_bind": "Vui lo\u0300ng nh\xe2\u0301p va\u0300o \u0111\xe2y \u0111\xea\u0309 li\xean k\xea\u0301t Telegram", "dashboard.event.unpaid_orders": "V\xe2\u0303n co\u0300n \u0111\u01a1n ha\u0300ng ch\u01b0a thanh toa\u0301n", "dashboard.event.pay_now": "Thanh toa\u0301n ngay", "dashboard.event.view_now": "Xem ngay", "dashboard.event.open_ticket": "{number} Ticket h\xf4\u0303 tr\u01a1\u0323 \u0111ang \u0111\u01b0\u01a1\u0323c x\u01b0\u0309 ly\u0301 ", "dashboard.event.suspend": "B\u1ea1n \u0111\xe3 b\u1ecb kh\xf3a t\u1ea1m th\u1eddi b\u1edfi h\u1ec7 th\u1ed1ng, th\u1eddi gian c\xf2n l\u1ea1i : {time}", "dashboard.event.nothing": "Kh\xf4ng co\u0301 d\u01b0\u0303 li\xea\u0323u", "dashboard.event.pending": "Th\xf4ng b\xe1o", "dashboard.invite.copy_link": "Sao ch\xe9p li\xean k\u1ebft l\u1eddi m\u1eddi", "knowledge.last_update": "L\xe2\u0300n c\xe2\u0323p nh\xe2\u0323t cu\xf4\u0301i cu\u0300ng va\u0300o", "knowledge.lock.title": "B\u1ea1n c\u1ea7n ph\u1ea3i mua go\u0301i di\u0323ch vu\u0323 \u0111\xea\u0309 xem h\u01b0\u01a1\u0301ng d\xe2\u0303n s\u01b0\u0309 du\u0323ng", "knowledge.lock.btn": "Mua ngay", "order.cancel": "Hu\u0309y", "order.column.trade_no": "# Ma\u0303 \u0111\u01a1n ha\u0300ng", "order.column.price_name": "Chu k\u1ef3", "order.column.total_amount": "T\xf4\u0309ng ti\xea\u0300n \u0111\u01a1n ha\u0300ng", "order.column.status": "Tra\u0323ng tha\u0301i \u0111\u01a1n ha\u0300ng", "order.detail.status.pending.subtitle": "H\xea\u0323 th\xf4\u0301ng \u0111ang x\u01b0\u0309 ly\u0301 \u0111\u01a1n ha\u0300ng, vui lo\u0300ng \u0111\u01a1\u0323i 1-3 phu\u0301t.", "order.detail.status.completed.subtitle": "\u0110\u01a1n ha\u0300ng \u0111a\u0303 \u0111\u01b0\u01a1\u0323c thanh toa\u0301n va\u0300 m\u01a1\u0309.", "order.detail.status.cancelled.subtitle": "\u0110\u01a1n ha\u0300ng \u0111a\u0303 bi\u0323 hu\u0309y do thanh toa\u0301n qua\u0301 th\u01a1\u0300i gian.", "order.detail.messager.info": "\u0110i \u0111\xea\u0301n thanh toa\u0301n", "order.detail.title": "Chi ti\xea\u0301t \u0111\u01a1n ha\u0300ng", "order.detail.payment_method": "Ph\u01b0\u01a1ng th\u01b0\u0301c thanh toa\u0301n", "order.detail.plan_title": "Th\xf4ng tin go\u0301i di\u0323ch vu\u0323", "order.detail.plan_name": "T\xean go\u0301i", "order.detail.price_name": "Th\u1eddi h\u1ea1n", "order.detail.plan_transter_enable": "Dung l\u01b0\u01a1\u0323ng", "order.detail.order_title": "Th\xf4ng tin \u0111\u01a1n ha\u0300ng", "order.detail.order_close_btn": "Hu\u0309y \u0111\u01a1n ha\u0300ng", "order.detail.order_trade_no": "Ma\u0303 \u0111\u01a1n ha\u0300ng", "order.detail.order_callback_no": "Ma\u0303 callback", "order.detail.order_discount_amount": "S\xf4\u0301 ti\xea\u0300n gia\u0309m gia\u0301", "order.detail.order_balance_payment": "S\xf4\u0301 d\u01b0 ta\u0300i khoa\u0309n", "order.detail.order_paid_at": "Th\u01a1\u0300i gian thanh toa\u0301n", "order.detail.operation.total": "T\xf4\u0309ng \u0111\u01a1n ha\u0300ng", "order.detail.operation.discount": "Gia\u0309m gia\u0301", "order.detail.operation.amount_to": "T\xf4\u0309ng thanh toa\u0301n", "order.detail.operation.check_out": "Thanh toa\u0301n", "subscribe.renew": "Gia ha\u0323n", "subscribe.purchase": "Mua ngay", "subscribe.renew_info": "Kh\xf4ng co\u0301 ma\u0301y chu\u0309, n\xea\u0301u ba\u0323n ch\u01b0a \u0111\u0103ng ky\u0301 go\u0301i di\u0323ch vu\u0323 ho\u0103\u0323c go\u0301i di\u0323ch vu\u0323 cu\u0309a ba\u0323n \u0111a\u0303 h\xea\u0301t ha\u0323n, vui lo\u0300ng", "subscribe.top.operation.reset_traffic": "Mua th\xeam dung l\u01b0\u01a1\u0323ng", "subscribe.top.operation.reset_traffic.title": "Ba\u0323n co\u0301 ch\u0103\u0301c mu\xf4\u0301n la\u0300m m\u01a1\u0301i la\u0323i dung l\u01b0\u01a1\u0323ng trong tha\u0301ng?", "subscribe.top.operation.reset_traffic.content": "\xc2\u0301n [Xa\u0301c nh\xe2\u0323n] \u0111\xea\u0309 chuy\xea\u0309n sang trang thanh toa\u0301n, sau khi thanh toa\u0301n dung l\u01b0\u01a1\u0323ng tha\u0301ng cu\u0309a ba\u0323n se\u0303 tr\u01a1\u0309 v\xea\u0300 s\xf4\u0301 0 va\u0300 c\xf4\u0323ng th\xeam dung l\u01b0\u01a1\u0323ng v\u01b0\u0300a mua.", "subscribe.top.operation.reset_private": "Thay \u0111\u1ed5i li\xean k\u1ebft g\xf3i \u0111\u0103ng k\xfd", "subscribe.top.operation.reset_private.title": "Ba\u0323n co\u0301 ch\u0103\u0301c ch\u0103\u0301n mu\xf4\u0301n thay \u0111\u1ed5i li\xean k\u1ebft g\xf3i \u0111\u0103ng ky\u0301?", "subscribe.top.operation.reset_private.content": "Trong tr\u01b0\u01a1\u0300ng h\u01a1\u0323p th\xf4ng tin ta\u0300i khoa\u0309n ho\u0103\u0323c go\u0301i di\u0323ch vu\u0323 cu\u0309a ba\u0323n bi\u0323 ro\u0300 ri\u0309, tu\u0300y cho\u0323n na\u0300y \u0111\u01b0\u01a1\u0323c s\u01b0\u0309 du\u0323ng \u0111\xea\u0309 thay \u0111\u1ed5i UUID cu\u0309a ba\u0323n va\u0300 li\xean k\u1ebft \u0111\u0103ng ky\u0301 se\u0303 bi\u0323 thay \u0111\xf4\u0309i sau khi \u0111\u0103\u0323t la\u0323i, ba\u0323n c\xe2\u0300n \u0111\u1ed3ng b\u1ed9 m\u1edbi li\xean k\u1ebft v\xe0o APP.", "subscribe.list.title": "Tra\u0323ng tha\u0301i ma\u0301y chu\u0309", "subscribe.list.column.name": "T\xean ma\u0301y chu\u0309", "subscribe.list.column.status": "Tra\u0323ng tha\u0301i", "subscribe.list.column.status.tip": "Tra\u0323ng tha\u0301i tr\u01b0\u0323c tuy\xea\u0301n cu\u0309a ma\u0301y chu\u0309 trong 5 phu\u0301t qua", "subscribe.list.column.online": "Tr\u1ef1c tuy\u1ebfn", "subscribe.list.column.online.tip": "S\u1ed1 l\u01b0\u1ee3ng ng\u01b0\u1eddi d\xf9ng trong n\u0103m ph\xfat qua", "subscribe.list.column.rate": "Ty\u0309 l\xea\u0323", "subscribe.list.column.rate.tip": "L\u01b0u l\u01b0\u01a1\u0323ng s\u01b0\u0309 du\u0323ng se\u0303 \u0111\u01b0\u01a1\u0323c nh\xe2n \u0111\xf4i v\u01a1\u0301i ty\u0309 l\xea\u0323", "subscribe.list.column.tags": "Ky\u0301 hi\xea\u0323u", "ticket.history": "Li\u0323ch s\u01b0\u0309 c\xe2u ho\u0309i li\xean h\xea\u0323", "ticket.new_btn": "Ta\u0323o m\u01a1\u0301i", "ticket.column.subject": "Chu\u0309 \u0111\xea\u0300", "ticket.column.level": "M\u01b0\u0301c \u0111\xf4\u0323", "ticket.column.level.low": "Th\xe2\u0301p", "ticket.column.level.medium": "Trung bi\u0300nh", "ticket.column.level.high": "Cao", "ticket.column.status": "Tra\u0323ng tha\u0301i", "ticket.column.status.not_reply": "\u0110ang ch\u01a1\u0300 tra\u0309 l\u01a1\u0300i", "ticket.column.status.replied": "\u0110a\u0303 tra\u0309 l\u01a1\u0300i", "ticket.column.updated_at": "L\xe2\u0300n tra\u0309 l\u01a1\u0300i cu\xf4\u0301i", "ticket.column.status.closed": "\u0110a\u0303 \u0111o\u0301ng", "ticket.column.operation.close": "\u0110o\u0301ng", "ticket.detail.enter_message": "\u0110i\xea\u0300n th\xf4ng tin n\xf4\u0323i dung tra\u0309 l\u01a1\u0300i...", "traffic.heatmap.title": "Bi\u1ec3u \u0111\u1ed3 d\u1eef li\u1ec7u", "traffic.list.title": "Chi ti\u1ebft dung l\u01b0\u1ee3ng \u0111\xe3 s\u1eed d\u1ee5ng c\u1ee7a nh\u1eefng th\xe1ng g\u1ea7n \u0111\xe2y.", "traffic.day": "H\xf4m nay", "traffic.week": "Tu\xe2\u0300n na\u0300y", "traffic.month": "Tha\u0301ng na\u0300y", "traffic.column.log_at": "Th\u01a1\u0300i gian", "traffic.column.n": "S\u1ed1 l\u01b0\u1ee3ng y\xeau c\u1ea7u k\u1ebft n\u1ed1i", "traffic.column.u": "Th\u01b0\u0323c t\xea\u0301 ta\u0309i l\xean", "traffic.column.d": "Th\u01b0\u0323c t\xea\u0301 ta\u0309i xu\xf4\u0301ng", "traffic.column.rate": "Ty\u0309 l\xea\u0323", "traffic.column.total": "T\xf4\u0309ng dung l\u01b0\u01a1\u0323ng", "traffic.column.total.tip": "C\xf4ng th\u01b0\u0301c: (Th\u01b0\u0323c t\xea\u0301 ta\u0309i l\xean + Th\u01b0\u0323c t\xea\u0301 ta\u0309i xu\xf4\u0301ng) = Dung l\u01b0\u01a1\u0323ng \u0111a\u0303 s\u01b0\u0309 du\u0323ng", "profile.telegram.bind": "Th\xeam li\xean k\xea\u0301t {name}", "profile.telegram.start_btn": "B\u0103\u0301t \u0111\xe2\u0300u ngay", "profile.telegram.discuss_group": "Link nho\u0301m Telegram", "profile.telegram.join_now": "Tham gia ngay", "profile.wallet.title": "Vi\u0301 ti\xea\u0300n cu\u0309a t\xf4i", "profile.wallet.tip": "Chi ti\xea\u0301t vi\u0301", "profile.wallet.tip.balance": "S\xf4\u0301 d\u01b0 ta\u0300i khoa\u0309n chi\u0301nh (Chi\u0309 \u0111\xea\u0309 thanh toa\u0301n)", "profile.wallet.tip.commission_balance": "S\xf4\u0301 d\u01b0 ti\xea\u0300n hoa h\xf4\u0300ng (Co\u0301 th\xea\u0309 \u0111\u01b0\u01a1\u0323c s\u01b0\u0309 du\u0323ng \u0111\xea\u0309 ru\u0301t ti\xea\u0300n)", "profile.wallet.withdrawal_btn": "Ru\u0301t ti\xea\u0300n hoa h\xf4\u0300ng", "profile.wallet.transfer_btn": "Chuy\xea\u0309n \u0111\xf4\u0309i", "profile.wallet.recharge_btn": "N\u1ea1p ti\u1ec1n", "profile.reset.reset_btn": "La\u0300m m\u01a1\u0301i", "profile.reset.reset_private": "Reset go\u0301i \u0111\u0103ng ky\u0301", "profile.reset.reset_private.title": "Ba\u0323n co\u0301 ch\u0103\u0301c ch\u0103\u0301n mu\xf4\u0301n reset go\u0301i \u0111\u0103ng ky\u0301?", "profile.reset.reset_private.content": "Trong tr\u01b0\u01a1\u0300ng h\u01a1\u0323p th\xf4ng tin ta\u0300i khoa\u0309n ho\u0103\u0323c \u0111\u0103ng ky\u0301 cu\u0309a ba\u0323n bi\u0323 ro\u0300 ri\u0309, tu\u0300y cho\u0323n na\u0300y \u0111\u01b0\u01a1\u0323c s\u01b0\u0309 du\u0323ng \u0111\xea\u0309 \u0111\u0103\u0323t la\u0323i UUID cu\u0309a ba\u0323n va\u0300 \u0111\u0103ng ky\u0301 se\u0303 bi\u0323 thay \u0111\xf4\u0309i sau khi \u0111\u0103\u0323t la\u0323i, ba\u0323n c\xe2\u0300n \u0111\u0103ng ky\u0301 la\u0323i.", "subscribe.top.operation.reset_private.messages.success": "\u0110\u1eb7t l\u1ea1i li\xean k\u1ebft g\xf3i th\xe0nh c\xf4ng", "profile.setting.notice": "Th\xf4ng ba\u0301o", "profile.setting.remind_expire": "Th\xf4ng b\xe1o h\u1ea1n s\u1eed d\u1ee5ng", "profile.setting.remind_traffic": "Th\xf4ng b\xe1o dung l\u01b0\u1ee3ng GB", "profile.password.message.password_diffrent": "Hai m\xe2\u0323t kh\xe2\u0309u kh\xf4ng tru\u0300ng kh\u01a1\u0301p", "profile.password.message.change_success": "\u0110\xf4\u0309i m\xe2\u0323t kh\xe2\u0309u tha\u0300nh c\xf4ng", "profile.password.title": "\u0110\xf4\u0309i m\xe2\u0323t kh\xe2\u0309u", "profile.password.save_btn": "L\u01b0u", "profile.password.old_password": "M\xe2\u0323t kh\xe2\u0309u cu\u0303", "profile.password.new_password": "M\xe2\u0323t kh\xe2\u0309u m\u01a1\u0301i", "profile.password.enter_old_password": "Vui lo\u0300ng nh\xe2\u0323p m\xe2\u0323t kh\xe2\u0309u cu\u0303", "profile.password.enter_new_password": "Vui lo\u0300ng nh\xe2\u0323p m\xe2\u0323t kh\xe2\u0309u m\u01a1\u0301i", "profile.password.enter_repeat_password": "Vui lo\u0300ng nh\xe2\u0323p la\u0323i m\xe2\u0323t kh\xe2\u0309u m\u01a1\u0301i", "plan.now": "MUA NGAY", "plan.detail.title": "C\xe2\u0301u hi\u0300nh go\u0301i \u0111\u0103ng ky\u0301", "plan.detail.cycle": "Chu ky\u0300 thanh toa\u0301n", "plan.detail.select_other_btn.title": "Kh\xf4ng th\xea\u0309 gia ha\u0323n go\u0301i di\u0323ch vu\u0323 na\u0300y", "plan.detail.select_other_btn": "Cho\u0323n m\xf4\u0323t go\u0301i di\u0323ch vu\u0323 kha\u0301c", "plan.detail.operation.discount": "Gia\u0309m gia\u0301", "plan.detail.operation.total": "T\xf4\u0309ng c\xf4\u0323ng", "plan.detail.operation.modal.title": "Th\xf4ng ba\u0301o! Go\u0301i di\u0323ch vu\u0323 thay \u0111\xf4\u0309i", "plan.detail.operation.modal.content": "Vi\xea\u0323c thay \u0111\xf4\u0309i go\u0301i di\u0323ch vu\u0323 m\u01a1\u0301i khi\xea\u0301n go\u0301i hi\xea\u0323n ta\u0323i bi\u0323 ghi \u0111e\u0300 b\u01a1\u0309i \u0111\u0103ng ky\u0301 m\u01a1\u0301i, xin l\u01b0u y\u0301.", "plan.detail.operation.amount_to": "T\xf4\u0309ng thanh toa\u0301n", "plan.detail.operation.check_out": "\u0110\u0103\u0323t ha\u0300ng", "plan.detail.coupon.check_btn": "A\u0301p du\u0323ng", "plan.detail.coupon.enter_coupon": "Ma\u0303 gia\u0309m gia\u0301\uff1f" },
                f = { "common.login": "\u767b\u5165", "common.logout": "\u767b\u51fa", "common.back_home": "\u8fd4\u56de\u9996\u9875", "common.email": "\u90ae\u7bb1", "common.email_code": "\u90ae\u7bb1\u9a8c\u8bc1\u7801", "common.password": "\u5bc6\u7801", "common.password_repeat": "\u91cd\u590d\u5bc6\u7801", "common.forget_password": "\u5fd8\u8bb0\u5bc6\u7801", "common.register": "\u6ce8\u518c", "common.send": "\u53d1\u9001", "common.message.request_error": "\u8bf7\u6c42\u5931\u8d25", "common.message.request_success": "\u53d1\u9001\u6210\u529f", "common.message.request_network_error": "\u7f51\u7edc\u5f02\u5e38", "common.message.reqeust_network_error.desc": "\u60a8\u7684\u7f51\u7edc\u53d1\u751f\u5f02\u5e38\uff0c\u65e0\u6cd5\u8fde\u63a5\u670d\u52a1\u5668", "common.message.check_samp_box": "\u5982\u679c\u6ca1\u6709\u6536\u5230\u9a8c\u8bc1\u7801, \u8bf7\u68c0\u67e5\u5783\u573e\u90ae\u4ef6\u7bb1", "common.message.different": "\u4e24\u6b21\u5bc6\u7801\u8f93\u5165\u4e0d\u540c", "common.message.copy_success": "\u590d\u5236\u6210\u529f", "common.column.created_at": "\u521b\u5efa\u65f6\u95f4", "common.column.operation": "\u64cd\u4f5c", "common.table.no_data": "\u6682\u65e0\u6570\u636e", "common.order.status.unpaid": "\u672a\u652f\u4ed8", "common.order.status.pending": "\u5904\u7406\u4e2d", "common.order.status.cancelled": "\u5df2\u53d6\u6d88", "common.order.status.completed": "\u5df2\u5b8c\u6210", "module.plan": "\u8d2d\u4e70\u8ba2\u9605", "module.subscribe": "\u6211\u7684\u8ba2\u9605", "module.dashboard": "\u4eea\u8868\u76d8", "module.knowledge": "\u4f7f\u7528\u6587\u6863", "module.order": "\u6211\u7684\u8ba2\u5355", "module.invite": "\u6211\u7684\u9080\u8bf7", "module.profile": "\u4e2a\u4eba\u4e2d\u5fc3", "module.ticket": "\u6211\u7684\u5de5\u5355", "module.traffic": "\u6d41\u91cf\u660e\u7ec6", "module.group.subscription": "\u8ba2\u9605", "module.group.billing": "\u8d22\u52a1", "module.group.account": "\u8d26\u6237", "modal.qrcode.waiting": "\u7b49\u5f85\u652f\u4ed8\u4e2d", "modal.telegram.got_it": "\u6211\u77e5\u9053\u4e86", "modal.telegram.first_step": "\u7b2c\u4e00\u6b65", "modal.telegram.second_step": "\u7b2c\u4e8c\u6b65", "modal.telegram.search": "\u6253\u5f00{name}\u641c\u7d22", "modal.telegram.send_bot": "\u5411\u673a\u5668\u4eba\u53d1\u9001\u4f60\u7684", "modal.telegram.bind": "\u7ed1\u5b9a{name}", "modal.ticket.create_success": "\u521b\u5efa\u5de5\u5355\u6210\u529f", "modal.ticket.title": "\u65b0\u7684\u5de5\u5355", "modal.ticket.subject": "\u4e3b\u9898", "modal.ticket.enter_jubject": "\u8bf7\u8f93\u5165\u5de5\u5355\u4e3b\u9898", "modal.ticket.level": "\u5de5\u5355\u7b49\u7ea7", "modal.ticket.enter_level": "\u8bf7\u9009\u62e9\u5de5\u5355\u7b49\u7ea7", "modal.ticket.level.low": "\u4f4e", "modal.ticket.level.medium": "\u4e2d", "modal.ticket.level.high": "\u9ad8", "modal.ticket.message": "\u6d88\u606f", "modal.ticket.enter_message": "\u8bf7\u63cf\u8ff0\u4f60\u9047\u5230\u7684\u95ee\u9898", "modal.wallet.recharge.title": "\u5145\u503c", "modal.wallet.recharge.amount": "\u5145\u503c\u91d1\u989d", "modal.wallet.recharge.tip": "\u5355\u7b14\u5145\u503c\u91d1\u989d\u533a\u95f4 ({minRechargeAmount} - {maxRechargeAmount})", "modal.wallet.recharge.enter_amount": "\u8bf7\u8f93\u5165\u9700\u8981\u5145\u503c\u7684\u91d1\u989d", "modal.wallet.transfer.title": "\u5212\u8f6c", "modal.wallet.transfer.tab.commission_balance": "\u63a8\u5e7f\u8d44\u91d1\u5212\u8f6c\u5230\u4f59\u989d", "modal.wallet.transfer.tab.balance": "\u4f59\u989d\u8f6c\u8d26", "modal.wallet.transfer_commission_balance.tip": "\u5212\u8f6c\u540e\u7684\u4f59\u989d\u4ec5\u7528\u4e8e\u5e73\u53f0\u6d88\u8d39\u4f7f\u7528", "modal.wallet.transfer_commission_balance.current_total": "\u5f53\u524d\u63a8\u5e7f\u4f63\u91d1\u4f59\u989d", "modal.wallet.transfer_commission_balance.amount": "\u5212\u8f6c\u91d1\u989d", "modal.wallet.transfer_commission_balance.enter_amount": "\u8bf7\u8f93\u5165\u9700\u8981\u5212\u8f6c\u5230\u4f59\u989d\u7684\u91d1\u989d", "modal.wallet.transfer.message.success": "\u5212\u8f6c\u6210\u529f", "modal.wallet.transfer_balance.current_total": "\u5f53\u524d\u4f59\u989d", "modal.wallet.transfer_balance.user_email": "\u7528\u6237\u90ae\u7bb1", "modal.wallet.transfer_balance.amount": "\u5212\u8f6c\u91d1\u989d", "modal.wallet.transfer_balance.enter_user_email": "\u8bf7\u8f93\u5165\u9700\u8981\u5212\u8f6c\u7684\u7528\u6237\u90ae\u7bb1", "modal.wallet.transfer_balance.enter_amount": "\u8bf7\u8f93\u5165\u9700\u8981\u5212\u8f6c\u7684\u91d1\u989d", "modal.wallet.wallet.withdrawal.title": "\u7533\u8bf7\u63d0\u73b0", "modal.wallet.wallet.withdrawal.method": "\u63d0\u73b0\u65b9\u5f0f", "modal.wallet.wallet.withdrawal.enter_method": "\u8bf7\u9009\u62e9\u63d0\u73b0\u65b9\u5f0f", "modal.wallet.wallet.withdrawal.account": "\u63d0\u73b0\u8d26\u53f7", "modal.wallet.wallet.withdrawal.enter_account": "\u8bf7\u8f93\u5165\u63d0\u73b0\u8d26\u53f7", "subscribe.oneclick.copy_url": "\u590d\u5236\u8ba2\u9605\u5730\u5740", "subscribe.oneclick.view_qrcode": "\u8ba2\u9605\u4e8c\u7ef4\u7801", "subscribe.oneclick.copy_btn": "\u590d\u5236\u8ba2\u9605", "subscribe.oneclick.btn": "\u4e00\u952e\u8ba2\u9605", "subscribe.oneclick.export": "\u5bfc\u5165\u5230 {name}", "subscribe.summary.not_expired": "\u8be5\u8ba2\u9605\u957f\u671f\u6709\u6548", "subscribe.summary.expired": "\u5df2\u8fc7\u671f", "subscribe.summary.expire_tip": "\u4e8e {expiredDay} \u5230\u671f\uff0c\u8ddd\u79bb\u5230\u671f\u8fd8\u6709 {leftDay} \u5929\uff0c {resetDay}\u65e5\u540e\u91cd\u7f6e\u6d41\u91cf", "subscribe.summary.expire_tip_not_reset": "\u4e8e {expiredDay} \u5230\u671f\uff0c\u8ddd\u79bb\u5230\u671f\u8fd8\u6709 {leftDay} \u5929", "subscribe.summary.expire_hour_tip": "\u4e8e {expiredDay} \u5230\u671f\uff0c\u8ddd\u79bb\u5230\u671f\u8fd8\u6709 {leftHour} \u5c0f\u65f6 ", "subscribe.summary.stats": "\u5df2\u7528 {usedTraffic}  / \u603b\u8ba1 {transferTotal}", "invite.generated": "\u5df2\u751f\u6210", "invite.list.title": "\u9080\u8bf7\u660e\u7ec6", "invite.list.column.updated_at": "\u5b8c\u6210\u65f6\u95f4", "invite.list.column.total_amount": "\u8ba2\u5355\u91d1\u989d", "invite.list.column.commission_rate": "\u4f63\u91d1\u7387", "invite.list.column.commission_balance": "\u4f63\u91d1", "invite.list.column.commission_status": "\u4f63\u91d1\u72b6\u6001", "invite.list.column.commission_status.new": "\u5f85\u786e\u8ba4", "invite.list.column.commission_status.pending": "\u53d1\u653e\u4e2d", "invite.list.column.commission_status.valid": "\u5df2\u53d1\u653e", "invite.list.column.commission_status.invalid": "\u65e0\u6548", "invite.manager.title": "\u9080\u8bf7\u7801\u7ba1\u7406", "invite.mangaer.generate_btn": "\u751f\u6210\u9080\u8bf7\u7801", "invite.manager.column.invite_code": "\u9080\u8bf7\u7801", "invite.manager.copy_link": "\u590d\u5236\u94fe\u63a5", "invite.stat.registerd": "\u5df2\u6ce8\u518c\u7528\u6237\u6570", "invite.stat.commission_rate": "\u4f63\u91d1\u6bd4\u4f8b", "invite.stat.commission_pending_balance": "\u786e\u8ba4\u4e2d\u7684\u4f63\u91d1", "invite.stat.commission_pending_balance.tip": "\u4f63\u91d1\u5c06\u4f1a\u5728\u786e\u8ba4\u540e\u4f1a\u5230\u8fbe\u4f60\u7684\u4f63\u91d1\u8d26\u6237", "register.invite_code": "\u9080\u8bf7\u7801", "register.invite_code_optional": "\u9080\u8bf7\u7801(\u9009\u586b)", "register.agree": "\u6211\u5df2\u9605\u8bfb\u540c\u610f", "register.terms": "\u670d\u52a1\u6761\u6b3e", "forget.reset_password_btn": "\u91cd\u7f6e\u5bc6\u7801", "dashboard.tab.world_overview": "\u8282\u70b9\u6982\u89c8", "dashboard.tab.knowledge": "\u65b0\u624b\u6559\u7a0b", "dashboard.node.overview": "\u8282\u70b9\u6982\u89c8", "dashboard.node.overview.total": "\u8282\u70b9\u6570\u91cf:{number}", "dashboard.node.overview.load": "\u8282\u70b9\u8d1f\u8f7d:{number}", "dashboard.notice.announcement": "\u516c\u544a", "dashboard.subscribe.purchase": "\u8d2d\u4e70", "dashboard.subscribe.renew": "\u7eed\u8d39", "dashboard.subscribe.view_subscription": "\u67e5\u770b\u8ba2\u9605", "dashboard.event.bind_telegram": "\u7ed1\u5b9aTelegram\u83b7\u53d6\u66f4\u591a\u670d\u52a1", "dashboard.event.click_bind": "\u70b9\u51fb\u8fd9\u91cc\u7ed1\u5b9a", "dashboard.event.unpaid_orders": "\u8fd8\u6709\u672a\u652f\u4ed8\u7684\u8ba2\u5355", "dashboard.event.pay_now": "\u7acb\u5373\u652f\u4ed8", "dashboard.event.view_now": "\u7acb\u5373\u67e5\u770b", "dashboard.event.open_ticket": "{number} \u6761\u5de5\u5355\u6b63\u5728\u5904\u7406\u4e2d ", "dashboard.event.suspend": "\u60a8\u5df2\u88ab\u7cfb\u7edf\u4e2d\u6b62\u4f7f\u7528, \u6062\u590d\u65f6\u95f4 : {time}", "dashboard.event.nothing": "\u6ca1\u6709\u4efb\u4f55\u4e8b\u4ef6", "dashboard.event.pending": "\u5f85\u529e\u4e8b\u4ef6", "knowledge.last_update": "\u6700\u540e\u66f4\u65b0", "knowledge.lock.title": "\u60a8\u9700\u8981\u8d2d\u4e70\u8ba2\u9605\u624d\u80fd\u67e5\u770b", "knowledge.lock.btn": "\u7acb\u5373\u8ba2\u9605", "order.cancel": "\u53d6\u6d88", "order.column.trade_no": "# \u8ba2\u5355\u53f7", "order.column.price_name": "\u5468\u671f", "order.column.total_amount": "\u91d1\u989d", "order.column.status": "\u72b6\u6001", "order.detail.status.pending.subtitle": "\u8ba2\u5355\u7cfb\u7edf\u6b63\u5728\u8fdb\u884c\u5904\u7406\uff0c\u8bf7\u7a0d\u7b491-3\u5206\u949f\u3002", "order.detail.status.completed.subtitle": "\u8ba2\u5355\u5df2\u652f\u4ed8\u5e76\u5904\u7406\u3002", "order.detail.status.cancelled.subtitle": "\u8ba2\u5355\u7531\u4e8e\u8d85\u65f6\u652f\u4ed8\u5df2\u88ab\u53d6\u6d88\u3002", "order.detail.messager.info": "\u6b63\u5728\u524d\u5f80\u6536\u94f6\u53f0", "order.detail.title": "\u8ba2\u5355\u8be6\u60c5", "order.detail.payment_method": "\u652f\u4ed8\u65b9\u5f0f", "order.detail.plan_title": "\u5546\u54c1\u4fe1\u606f", "order.detail.plan_name": "\u4ea7\u54c1\u540d\u79f0", "order.detail.price_name": "\u5468\u671f", "order.detail.plan_transter_enable": "\u4ea7\u54c1\u6d41\u91cf", "order.detail.order_title": "\u8ba2\u5355\u4fe1\u606f", "order.detail.order_close_btn": "\u5173\u95ed\u8ba2\u5355", "order.detail.order_trade_no": "\u8ba2\u5355\u53f7", "order.detail.order_callback_no": "\u7b2c\u4e09\u65b9\u56de\u8c03\u53f7", "order.detail.order_discount_amount": "\u4f18\u60e0\u91d1\u989d", "order.detail.order_balance_payment": "\u4f59\u989d\u652f\u4ed8", "order.detail.order_paid_at": "\u652f\u4ed8\u65f6\u95f4", "order.detail.operation.total": "\u8ba2\u5355\u603b\u989d", "order.detail.operation.discount": "\u6298\u6263", "order.detail.operation.amount_to": "\u603b\u8ba1", "order.detail.operation.check_out": "\u7ed3\u8d26", "subscribe.renew": "\u7eed\u8d39", "subscribe.purchase": "\u8d2d\u4e70", "subscribe.renew_info": "\u6ca1\u6709\u53ef\u7528\u8282\u70b9\uff0c\u5982\u679c\u60a8\u672a\u8ba2\u9605\u6216\u5df2\u8fc7\u671f\u8bf7", "subscribe.top.operation.reset_traffic": "\u91cd\u7f6e\u5f53\u6708\u6d41\u91cf", "subscribe.top.operation.reset_traffic.title": "\u786e\u5b9a\u8981\u91cd\u7f6e\u5f53\u6708\u6d41\u91cf\uff1f", "subscribe.top.operation.reset_traffic.content": "\u70b9\u51fb\u300c\u786e\u5b9a\u300d\u5c06\u4f1a\u8df3\u8f6c\u5230\u6536\u94f6\u53f0\uff0c\u652f\u4ed8\u8ba2\u5355\u540e\u7cfb\u7edf\u5c06\u4f1a\u6e05\u7a7a\u60a8\u5f53\u6708\u5df2\u4f7f\u7528\u6d41\u91cf\u3002", "subscribe.top.operation.reset_private": "\u91cd\u7f6e\u8ba2\u9605\u4fe1\u606f", "subscribe.top.operation.reset_private.title": "\u786e\u5b9a\u8981\u91cd\u7f6e\u8ba2\u9605\u4fe1\u606f\uff1f", "subscribe.top.operation.reset_private.content": "\u5982\u679c\u4f60\u7684\u8ba2\u9605\u5730\u5740\u6216\u4fe1\u606f\u6cc4\u9732\u53ef\u4ee5\u8fdb\u884c\u6b64\u64cd\u4f5c\u3002\u91cd\u7f6e\u540e\u4f60\u7684UUID\u53ca\u8ba2\u9605\u5c06\u4f1a\u53d8\u66f4\uff0c\u9700\u8981\u91cd\u65b0\u8fdb\u884c\u8ba2\u9605\u3002", "subscribe.top.operation.reset_private.messages.success": "\u91cd\u7f6e\u8ba2\u9605\u4fe1\u606f\u6210\u529f", "subscribe.list.title": "\u8282\u70b9\u72b6\u6001", "subscribe.list.column.name": "\u540d\u79f0", "subscribe.list.column.status": "\u72b6\u6001", "subscribe.list.column.status.tip": "\u8282\u70b9\u4e94\u5206\u949f\u5185\u8282\u70b9\u5728\u7ebf\u60c5\u51b5", "subscribe.list.column.rate": "\u500d\u7387", "subscribe.list.column.rate.tip": "\u4f7f\u7528\u7684\u6d41\u91cf\u5c06\u4e58\u4ee5\u500d\u7387\u8fdb\u884c\u6263\u9664", "subscribe.list.column.tags": "\u6807\u7b7e", "ticket.history": "\u5de5\u5355\u5386\u53f2", "ticket.new_btn": "\u65b0\u7684\u5de5\u5355", "ticket.column.subject": "\u4e3b\u9898", "ticket.column.level": "\u5de5\u5355\u7b49\u7ea7", "ticket.column.level.low": "\u4f4e", "ticket.column.level.medium": "\u4e2d", "ticket.column.level.high": "\u9ad8", "ticket.column.status": "\u72b6\u6001", "ticket.column.status.not_reply": "\u5f85\u56de\u590d", "ticket.column.status.replied": "\u5df2\u56de\u590d", "ticket.column.updated_at": "\u6700\u540e\u56de\u590d", "ticket.column.status.closed": "\u5df2\u5173\u95ed", "ticket.column.operation.close": "\u5173\u95ed", "ticket.detail.enter_message": "\u8f93\u5165\u5185\u5bb9\u56de\u590d\u5de5\u5355...", "traffic.heatmap.title": "\u6d41\u91cf\u70ed\u529b\u56fe", "traffic.list.title": "\u6d41\u91cf\u8be6\u60c5", "traffic.column.log_at": "\u8bb0\u5f55\u65f6\u95f4", "traffic.column.n": "\u8bf7\u6c42\u6b21\u6570", "traffic.column.u": "\u5b9e\u9645\u4e0a\u884c", "traffic.column.d": "\u5b9e\u9645\u4e0b\u884c", "traffic.column.total": "\u5408\u8ba1", "traffic.column.total.tip": "\u516c\u5f0f\uff1a(\u5b9e\u9645\u4e0a\u884c + \u5b9e\u9645\u4e0b\u884c) = \u6263\u9664\u6d41\u91cf", "profile.telegram.bind": "\u7ed1\u5b9a{name}", "profile.telegram.start_btn": "\u7acb\u5373\u5f00\u59cb", "profile.telegram.discuss_group": "Telegram \u8ba8\u8bba\u7ec4", "profile.telegram.join_now": "\u7acb\u5373\u52a0\u5165", "profile.wallet.title": "\u6211\u7684\u94b1\u5305", "profile.wallet.tip": "\u94b1\u5305\u7ec4\u6210\u90e8\u5206", "profile.wallet.tip.balance": "\u8d26\u6237\u4f59\u989d(\u4ec5\u6d88\u8d39)", "profile.wallet.tip.commission_balance": "\u63a8\u5e7f\u4f63\u91d1(\u53ef\u63d0\u73b0)", "profile.wallet.withdrawal_btn": "\u63a8\u5e7f\u4f63\u91d1\u63d0\u73b0", "profile.wallet.transfer_btn": "\u5212\u8f6c", "profile.wallet.recharge_btn": "\u5145\u503c", "profile.reset.reset_btn": "\u91cd\u7f6e", "profile.reset.reset_private": "\u91cd\u7f6e\u8ba2\u9605\u4fe1\u606f", "profile.reset.reset_private.title": "\u786e\u5b9a\u8981\u91cd\u7f6e\u8ba2\u9605\u4fe1\u606f\uff1f", "profile.reset.reset_private.content": "\u5982\u679c\u4f60\u7684\u8ba2\u9605\u5730\u5740\u6216\u4fe1\u606f\u6cc4\u9732\u53ef\u4ee5\u8fdb\u884c\u6b64\u64cd\u4f5c\u3002\u91cd\u7f6e\u540e\u4f60\u7684UUID\u53ca\u8ba2\u9605\u5c06\u4f1a\u53d8\u66f4\uff0c\u9700\u8981\u91cd\u65b0\u8fdb\u884c\u8ba2\u9605\u3002", "profile.setting.notice": "\u901a\u77e5", "profile.setting.remind_expire": "\u8ba2\u9605\u5230\u671f\u63d0\u9192", "profile.setting.remind_traffic": "\u6d41\u91cf\u4f7f\u7528\u63d0\u9192", "profile.password.message.password_diffrent": "\u4e24\u6b21\u65b0\u5bc6\u7801\u8f93\u5165\u4e0d\u540c", "profile.password.message.change_success": "\u5bc6\u7801\u4fee\u6539\u6210\u529f", "profile.password.title": "\u4fee\u6539\u5bc6\u7801", "profile.password.save_btn": "\u4fdd\u5b58", "profile.password.old_password": "\u65e7\u5bc6\u7801", "profile.password.new_password": "\u65b0\u5bc6\u7801", "profile.password.enter_old_password": "\u8bf7\u8f93\u5165\u65e7\u5bc6\u7801", "profile.password.enter_new_password": "\u8bf7\u8f93\u5165\u65b0\u5bc6\u7801", "profile.password.enter_repeat_password": "\u8bf7\u91cd\u590d\u65b0\u5bc6\u7801", "plan.now": "\u7acb\u5373\u8ba2\u9605", "plan.detail.title": "\u914d\u7f6e\u8ba2\u9605", "plan.detail.cycle": "\u4ed8\u6b3e\u5468\u671f", "plan.detail.select_other_btn.title": "\u8be5\u8ba2\u9605\u65e0\u6cd5\u7eed\u8d39", "plan.detail.select_other_btn": "\u9009\u62e9\u5176\u4ed6\u8ba2\u9605", "plan.detail.operation.discount": "\u6298\u6263", "plan.detail.operation.total": "\u8ba2\u5355\u603b\u989d", "plan.detail.operation.modal.title": "\u8ba2\u9605\u53d8\u66f4\u987b\u77e5", "plan.detail.operation.modal.content": "\u53d8\u66f4\u8ba2\u9605\u4f1a\u5bfc\u81f4\u5f53\u524d\u8ba2\u9605\u88ab\u65b0\u8ba2\u9605\u8986\u76d6\uff0c\u8bf7\u6ce8\u610f\u3002", "plan.detail.operation.amount_to": "\u603b\u8ba1", "plan.detail.operation.check_out": "\u4e0b\u5355", "plan.detail.coupon.check_btn": "\u9a8c\u8bc1", "plan.detail.coupon.enter_coupon": "\u6709\u4f18\u60e0\u5238\uff1f" },
                p = !0,
                h = { "en-US": { messages: Object(r["a"])({}, m), locale: "en-US", momentLocale: "" }, "vi-VN": { messages: Object(r["a"])({}, j), locale: "vi-VN", momentLocale: "vi" }, "zh-CN": { messages: Object(r["a"])({}, f), locale: "zh-CN", momentLocale: "zh-cn" } },
                O = function(e, t) { return !a || t || e ? e && h[e] ? Object(c["a"])(h[e]) : (l()(!e || !!h[e], "The current popular language does not exist, please check the locales folder!"), h["vi-VN"] ? Object(c["a"])(h["vi-VN"]) : Object(c["a"])({ locale: "vi-VN", messages: {} })) : a },
                g = function(e) { a = O(e, !0) },
                v = function() { var e = d["a"].applyPlugins({ key: "locale", type: s["a"].modify, initialValue: {} }); if ("function" === typeof(null === e || void 0 === e ? void 0 : e.getLocale)) return e.getLocale(); var t, n = "undefined" !== typeof localStorage && p ? window.localStorage.getItem("umi_locale") : ""; return n || t || "vi-VN" },
                x = function(e) {
                    var t = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1],
                        n = d["a"].applyPlugins({ key: "locale", type: s["a"].modify, initialValue: {} }),
                        a = function() {
                            if (v() !== e)
                                if ("undefined" !== typeof window.localStorage && p && window.localStorage.setItem("umi_locale", e || ""), g(e), t) window.location.reload();
                                else if (i["d"].emit(i["a"], e), window.dispatchEvent) {
                                var n = new Event("languagechange");
                                window.dispatchEvent(n)
                            }
                        };
                    "function" !== typeof(null === n || void 0 === n ? void 0 : n.setLocale) ? a(): n.setLocale({ lang: e, realReload: t, updater: a })
                }
        },
        GQ4l: function(e, t, n) {
            "use strict";
            n.r(t);
            n("T2oS");
            var a = n("W9HT"),
                r = (n("miYZ"), n("tsqr")),
                c = n("9og8"),
                s = n("tJVT"),
                i = n("WmNS"),
                o = n.n(i),
                l = n("9kvl"),
                d = n("q1tI"),
                u = n("L0Pg"),
                b = n("kMsK"),
                m = n("lxOd"),
                j = n("CLrh"),
                f = n("X8fG"),
                p = n("ye1Q"),
                h = n("UbMB"),
                O = n.n(h),
                g = n("wd/R"),
                v = n.n(g),
                x = n("Alia"),
                w = n.n(x),
                k = n("nKUr"),
                _ = function(e) {
                    var t = e.match,
                        n = Object(d["useState"])(),
                        i = Object(s["a"])(n, 2),
                        h = i[0],
                        g = i[1],
                        x = Object(d["useState"])(document.body.offsetHeight - 150),
                        _ = Object(s["a"])(x, 2),
                        y = _[0],
                        N = _[1],
                        S = 5e3,
                        M = Object(d["useState"])(!1),
                        C = Object(s["a"])(M, 2),
                        T = C[0],
                        I = C[1],
                        D = Object(d["useState"])(S),
                        E = Object(s["a"])(D, 2),
                        R = E[0],
                        F = E[1],
                        P = Object(d["useRef"])(null),
                        q = Object(d["useRef"])(null),
                        A = t.params,
                        U = A.id,
                        L = Object(l["g"])(),
                        V = function(e) { return O()("d-inline-block", "font-w600", "bg-body-light", "border-3x", "px-3", "py-2", "mb-2", "shadow-sm", "mw-100", "text-left", "rounded-right", { "border-right": e, "border-primary": e, "border-success": !1 === e, "border-left": !1 === e, animated: !1 === e, fadeIn: !1 === e, "text-success": !1 === e }) },
                        G = function(e) { return O()({ "ml-4": e, "text-right": e, "mr-4": !1 === e }) },
                        Y = function(e) { return O()("font-size-sm", "font-italic", "text-muted", "my-2", { "text-right": e }) },
                        B = function() {
                            var e = Object(c["a"])(o.a.mark((function e() {
                                var t, n, a, c, s;
                                return o.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            if (n = null === (t = P.current) || void 0 === t ? void 0 : t.value, a = null === h || void 0 === h ? void 0 : h.id, !("" !== n && a > 0)) { e.next = 10; break }
                                            return e.next = 5, Object(j["I"])({ id: a, message: n });
                                        case 5:
                                            if (s = e.sent, void 0 !== s) { e.next = 8; break }
                                            return e.abrupt("return");
                                        case 8:
                                            null === (c = q.current) || void 0 === c || c.reset(), r["default"].success(L.formatMessage({ id: "common.message.request_success" }));
                                        case 10:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }(),
                        z = function() {
                            var e = Object(c["a"])(o.a.mark((function e() {
                                var t;
                                return o.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return e.next = 2, Object(j["G"])({ id: U });
                                        case 2:
                                            if (t = e.sent, void 0 !== t) { e.next = 6; break }
                                            return l["c"].replace(f["o"]), e.abrupt("return");
                                        case 6:
                                            g(t.data), 1 === t.data.status && F(null), T || I(!0);
                                        case 9:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    Object(u["a"])(z, R, { immediate: !0 }), Object(b["a"])((function() { F(null) }));
                    var H = Object(m["a"])((function() {
                        var e = document.body.offsetHeight - 150;
                        N(e)
                    }), { wait: 1e3 });
                    return Object(d["useEffect"])((function() {
                        return window.addEventListener("resize", (function() { H.run() })),
                            function() { window.removeEventListener("resize", (function() { H.run() })) }
                    }), []), Object(k["jsx"])(k["Fragment"], { children: T ? Object(k["jsx"])("div", { id: "root", children: Object(k["jsxs"])("div", { children: [Object(k["jsxs"])("div", { className: "block-content block-content-full bg-primary", children: [Object(k["jsx"])("p", { className: "font-size-lg font-w600 text-white mt-0 mb-0", children: f["r"] }), Object(k["jsx"])("p", { className: "text-white-75 mb-0", children: "Support" })] }), Object(k["jsx"])(w.a, { scrollBehavior: "smooth", showOption: !1, height: y, children: Object(k["jsx"])("div", { className: "js-chat-messages block-content block-content-full text-wrap-break-word overflow-y-auto", children: null === h || void 0 === h ? void 0 : h.message.map((function(e) { return Object(k["jsxs"])("div", { children: [Object(k["jsx"])("div", { className: Y(e.is_me), children: v.a.unix(Number(e.created_at)).format("DD/MM/YYYY HH:mm") }), Object(k["jsx"])("div", { className: G(e.is_me), children: Object(k["jsx"])("div", { className: V(e.is_me), children: e.message }) })] }, e.id) })) }) }), Object(k["jsx"])("div", { className: "js-chat-form block-content p-2 bg-body-dark", children: Object(k["jsx"])("form", { ref: q, children: Object(k["jsx"])("input", { type: "text", ref: P, className: "js-chat-input form-control form-control-alt", placeholder: L.formatMessage({ id: "ticket.detail.enter_message" }), onKeyDown: function(e) { "Enter" === e.key && (e.preventDefault(), B()) } }) }) })] }) }) : Object(k["jsx"])(a["a"], { indicator: Object(k["jsx"])(p["a"], { style: { fontSize: 24 }, spin: !0 }) }) })
                };
            t["default"] = _
        },
        I5X1: function(e, t, n) {
            "use strict";
            n.d(t, "a", (function() { return o }));
            var a = n("tJVT"),
                r = n("q1tI"),
                c = n("1WJl"),
                s = n.n(c),
                i = n("qwGt");

            function o(e, t) {
                var n = Object(r["useContext"])(i["a"]),
                    c = Object(r["useRef"])(t);
                c.current = t;
                var o = Object(r["useState"])((function() { return c.current ? c.current(n.data[e]) : n.data[e] })),
                    l = Object(a["a"])(o, 2),
                    d = l[0],
                    u = l[1],
                    b = Object(r["useRef"])(d);
                b.current = d;
                var m = Object(r["useRef"])(!1);
                return Object(r["useEffect"])((function() {
                    return m.current = !0,
                        function() { m.current = !1 }
                }), []), Object(r["useEffect"])((function() {
                    var a = function(a) {
                        if (m.current)
                            if (t && c.current) {
                                var r = c.current(a),
                                    i = b.current;
                                s()(r, i) || u(r)
                            } else u(a);
                        else setTimeout((function() { n.data[e] = a, n.update(e) }))
                    };
                    try { n.callbacks[e].add(a), n.update(e) } catch (r) { n.callbacks[e] = new Set, n.callbacks[e].add(a), n.update(e) }
                    return function() { n.callbacks[e].delete(a) }
                }), [e]), d
            }
        },
        "IS+0": function(e, t, n) {
            "use strict";
            var a = n("jrin"),
                r = n("tJVT"),
                c = n("q1tI"),
                s = n("L0Pg"),
                i = n("lxOd"),
                o = n("UbMB"),
                l = n.n(o),
                d = n("/YUT"),
                u = n.n(d),
                b = n("9kvl"),
                m = n("nKUr"),
                j = function(e, t) {
                    var n = e.onSend,
                        o = e.onChange,
                        d = e.btnClassName,
                        j = 60,
                        f = null,
                        p = Object(c["useState"])(!1),
                        h = Object(r["a"])(p, 2),
                        O = h[0],
                        g = h[1],
                        v = Object(c["useState"])(j),
                        x = Object(r["a"])(v, 2),
                        w = x[0],
                        k = x[1],
                        _ = Object(c["useState"])(f),
                        y = Object(r["a"])(_, 2),
                        N = y[0],
                        S = y[1],
                        M = Object(c["useRef"])(null),
                        C = Object(c["useRef"])(null),
                        T = Object(b["g"])(),
                        I = l()("btn", "btn-lg", "btn-block", Object(a["a"])({}, "".concat(d), d));
                    Object(s["a"])((function() { k(w - 1) }), N, { immediate: !1 }), Object(c["useImperativeHandle"])(t, (function() {
                        return {
                            triggerClick: function() {
                                var e;
                                null === (e = C.current) || void 0 === e || e.click()
                            }
                        }
                    }));
                    var D = function() { n().then((function(e) {!0 === e && (g(!0), S(1e3)) })) };
                    Object(c["useEffect"])((function() {!0 === O && 0 === w && u()(500).then((function() { g(!1), S(null), k(j) })) }), [w, O]);
                    var E = Object(i["a"])((function() {
                            var e, t = null === (e = M.current) || void 0 === e ? void 0 : e.value;
                            o(t)
                        }), { wait: 300 }),
                        R = E.run,
                        F = R;
                    return Object(m["jsx"])(m["Fragment"], { children: Object(m["jsxs"])("div", { className: "form-group form-row ", children: [Object(m["jsx"])("div", { className: "col-9", children: Object(m["jsx"])("input", { ref: M, className: "form-control form-control-lg form-control-alt", placeholder: T.formatMessage({ id: "common.email_code" }), onChange: F }) }), Object(m["jsx"])("div", { className: "col-3", children: Object(m["jsx"])("button", { type: "button", className: I, onClick: D, disabled: O, ref: C, children: !1 === O ? T.formatMessage({ id: "common.send" }) : w }) })] }) })
                };
            t["a"] = Object(c["forwardRef"])(j)
        },
        IXGU: function(e, t, n) {},
        L19o: function(e, t, n) {
            "use strict";
            n("+3vq");
            var a = n("q1tI"),
                r = n("TSYQ"),
                c = n.n(r),
                s = n("lxOd"),
                i = n("9kvl"),
                o = n("nKUr"),
                l = function(e) {
                    var t = e.whiteList,
                        n = e.onChange,
                        r = Object(a["useRef"])(null),
                        l = Object(a["useRef"])(null),
                        d = c()("form-group", { "v2board-email-whitelist-enable": void 0 !== t }),
                        u = Object(i["g"])(),
                        b = Object(s["a"])((function() {
                            var e, a, c = null === (e = r.current) || void 0 === e ? void 0 : e.value,
                                s = null === (a = l.current) || void 0 === a ? void 0 : a.value;
                            if (void 0 !== t) {
                                var i = "".concat(c, "@").concat(s);
                                n(i)
                            } else n(c)
                        }), { wait: 300 }),
                        m = b.run,
                        j = m;
                    return Object(o["jsx"])(o["Fragment"], { children: Object(o["jsx"])("div", { className: d, children: Object(o["jsxs"])("div", { className: "input-group", children: [Object(o["jsx"])("input", { ref: r, onChange: j, className: "form-control form-control-lg form-control-alt", placeholder: u.formatMessage({ id: "common.email" }) }), void 0 !== t && Object(o["jsxs"])(o["Fragment"], { children: [Object(o["jsx"])("div", { className: "input-group-prepend", children: Object(o["jsx"])("button", { type: "button", className: "btn btn-success", children: Object(o["jsx"])("i", { className: "fa  fa-at" }) }) }), Object(o["jsx"])("select", { ref: l, onChange: j, className: "form-control-lg form-control-alt", children: t.map((function(e) { return Object(o["jsx"])("option", { value: e, children: e }, e) })) })] })] }) }) })
                };
            t["a"] = l
        },
        Lcwg: function(e, t, n) {
            "use strict";
            n.r(t);
            n("J+/v");
            var a = n("MoRW"),
                r = (n("+L6B"), n("2/Rp")),
                c = (n("Awhp"), n("KrTs")),
                s = (n("DYRE"), n("zeV3")),
                i = (n("5Dmo"), n("3S7+")),
                o = n("k1fw"),
                l = n("9og8"),
                d = n("tJVT"),
                u = n("WmNS"),
                b = n.n(u),
                m = (n("790Q"), n("q1tI")),
                j = n("9kvl"),
                f = n("CLrh"),
                p = n("X8fG"),
                h = (n("aCde"), n("lxOd")),
                O = n("nKUr"),
                g = function(e) {
                    var t = Object(m["useRef"])(null),
                        n = e.planID,
                        a = e.priceID,
                        r = e.onCheckSuccess,
                        c = Object(m["useState"])(""),
                        s = Object(d["a"])(c, 2),
                        i = s[0],
                        o = s[1],
                        u = Object(m["useState"])(!0),
                        p = Object(d["a"])(u, 2),
                        g = p[0],
                        v = p[1],
                        x = Object(j["g"])(),
                        w = Object(h["a"])((function(e) {
                            Object(l["a"])(b.a.mark((function c() {
                                var s, i, l, d, u, m, j;
                                return b.a.wrap((function(c) {
                                    while (1) switch (c.prev = c.next) {
                                        case 0:
                                            return e.preventDefault(), i = null === (s = t.current) || void 0 === s ? void 0 : s.value, c.next = 4, Object(f["c"])({ plan_id: n, price_id: a, code: i });
                                        case 4:
                                            if (l = c.sent, void 0 !== l && void 0 !== l.data) { c.next = 7; break }
                                            return c.abrupt("return");
                                        case 7:
                                            d = l.data, u = d.type, m = d.value, j = d.name, r({ planID: n, type: u, value: m, name: j, code: i }), o(i), v(!0);
                                        case 11:
                                        case "end":
                                            return c.stop()
                                    }
                                }), c)
                            })))()
                        }), { wait: 500 }),
                        k = w.run;
                    return Object(O["jsx"])(O["Fragment"], {
                        children: Object(O["jsxs"])("div", {
                            className: "block block-link-pop block-rounded block-bordered px-3 py-3 mb-2 text-light",
                            style: { background: "rgb(53, 56, 61)" },
                            children: [Object(O["jsx"])("input", {
                                type: "text",
                                className: "form-control v2board-input-coupon p-0",
                                placeholder: x.formatMessage({ id: "plan.detail.coupon.enter_coupon" }),
                                ref: t,
                                onChange: function(e) {
                                    if (!1 !== g) {
                                        var t = e.target.value;
                                        t.length > 0 && i !== t && v(!1)
                                    }
                                }
                            }), Object(O["jsxs"])("button", { type: "button", className: "btn btn-primary", style: { position: "absolute", right: 30, top: 17 }, onClick: function(e) { k(e) }, disabled: g, children: [Object(O["jsx"])("i", { className: "fa fa-fw fa-ticket-alt mr-2" }), x.formatMessage({ id: "plan.detail.coupon.check_btn" })] })]
                        })
                    })
                },
                v = g,
                x = (n("2qtc"), n("kLXV")),
                w = n("ye1Q"),
                k = function(e) {
                    var t = Object(m["useState"])(!1),
                        n = Object(d["a"])(t, 2),
                        a = n[0],
                        r = n[1],
                        c = Object(j["h"])("useSubModel"),
                        s = c.subState,
                        i = Object(j["g"])(),
                        u = e.planID,
                        h = e.planAmount,
                        g = e.planName,
                        v = e.priceID,
                        k = e.planMethodName,
                        _ = e.couponName,
                        y = e.discountAmount,
                        N = e.totalAmount,
                        S = e.couponCode,
                        M = function() {
                            var e = Object(l["a"])(b.a.mark((function e() {
                                var t;
                                return b.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            r(!0), t = function() {
                                                var e = Object(l["a"])(b.a.mark((function e() {
                                                    var t, n, a;
                                                    return b.a.wrap((function(e) {
                                                        while (1) switch (e.prev = e.next) {
                                                            case 0:
                                                                return t = { plan_id: u, price_id: v }, void 0 !== typeof S && (t = Object(o["a"])(Object(o["a"])({}, t), {}, { coupon_code: S })), e.next = 4, Object(f["s"])(t);
                                                            case 4:
                                                                if (n = e.sent, void 0 !== n) { e.next = 7; break }
                                                                return e.abrupt("return", Promise.reject());
                                                            case 7:
                                                                return a = "/order/".concat(n.data), e.abrupt("return", Promise.resolve(a));
                                                            case 9:
                                                            case "end":
                                                                return e.stop()
                                                        }
                                                    }), e)
                                                })));
                                                return function() { return e.apply(this, arguments) }
                                            }(), s.planID !== u ? x["a"].confirm({
                                                title: i.formatMessage({ id: "plan.detail.operation.modal.title" }),
                                                content: i.formatMessage({ id: "plan.detail.operation.modal.content" }),
                                                onOk: function() {
                                                    var e = Object(l["a"])(b.a.mark((function e() {
                                                        return b.a.wrap((function(e) {
                                                            while (1) switch (e.prev = e.next) {
                                                                case 0:
                                                                    t().then((function(e) { j["c"].push(e) }), (function() { r(!1) }));
                                                                case 1:
                                                                case "end":
                                                                    return e.stop()
                                                            }
                                                        }), e)
                                                    })));

                                                    function n() { return e.apply(this, arguments) }
                                                    return n
                                                }()
                                            }) : t().then((function(e) { j["c"].push(e) }), (function() { r(!1) })), r(!1);
                                        case 4:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsxs"])("div", { className: "block block-link-pop block-rounded block-bordered px-3 py-3 text-light", style: { background: "rgb(53, 56, 61)" }, children: [Object(O["jsx"])("h5", { className: "text-light mb-3", children: i.formatMessage({ id: "plan.detail.operation.total" }) }), Object(O["jsxs"])("div", { className: "row no-gutters pb-3", style: { borderBottom: "1px solid rgb(100, 102, 105)" }, children: [Object(O["jsxs"])("div", { className: "col-8", children: [g, " x ", k] }), Object(O["jsx"])("div", { className: "col-4 text-right", children: p["f"].format(h / 100) })] }), y && _ && Object(O["jsxs"])("div", { children: [Object(O["jsx"])("div", { className: "pt-3", style: { color: "rgb(100, 102, 105)" }, children: i.formatMessage({ id: "plan.detail.operation.discount" }) }), Object(O["jsxs"])("div", { className: "row no-gutters py-3", style: { borderBottom: "1px solid rgb(100, 102, 105)" }, children: [Object(O["jsx"])("div", { className: "col-8", children: _ }), Object(O["jsxs"])("div", { className: "col-4 text-right", children: ["- ", p["f"].format(y / 100)] })] })] }), Object(O["jsx"])("div", { className: "pt-3", style: { color: "rgb(100, 102, 105)" }, children: i.formatMessage({ id: "plan.detail.operation.amount_to" }) }), Object(O["jsx"])("h1", { className: "text-light mt-3 mb-3", children: N > 0 ? p["f"].format(N / 100) : p["f"].format(0) }), Object(O["jsx"])("button", { type: "button", className: "btn btn-block btn-primary", onClick: function(e) { e.preventDefault(), M() }, children: Object(O["jsxs"])("span", { children: [a && Object(O["jsx"])("span", { children: Object(O["jsx"])(w["a"], { style: { fontSize: 24 } }) }), !a && Object(O["jsxs"])("span", { children: [Object(O["jsx"])("i", { className: "far fa-check-circle" }), i.formatMessage({ id: "plan.detail.operation.check_out" })] })] }) })] }) })
                },
                _ = k,
                y = n("Ty5D"),
                N = n("Lyp1"),
                S = function(e) {
                    var t = e.match,
                        n = Object(y["g"])(),
                        u = void 0 !== n.state ? n.state.defaultCheckedIndex : void 0,
                        h = Object(j["h"])("useMenuModel"),
                        g = h.setMenuName,
                        x = Object(j["h"])("useSubModel"),
                        w = x.subState,
                        k = x.initSubState,
                        S = Object(m["useState"])(),
                        M = Object(d["a"])(S, 2),
                        C = M[0],
                        T = M[1],
                        I = Object(m["useState"])(),
                        D = Object(d["a"])(I, 2),
                        E = D[0],
                        R = D[1],
                        F = Object(m["useState"])(),
                        P = Object(d["a"])(F, 2),
                        q = P[0],
                        A = P[1],
                        U = Object(m["useState"])(0),
                        L = Object(d["a"])(U, 2),
                        V = L[0],
                        G = L[1],
                        Y = t.params,
                        B = Y.id,
                        z = Object(j["g"])(),
                        H = function() { R({ planID: null === C || void 0 === C ? void 0 : C.id, planAmount: null === q || void 0 === q ? void 0 : q.value, priceID: null === q || void 0 === q ? void 0 : q.id, planName: null === C || void 0 === C ? void 0 : C.name, totalAmount: null === q || void 0 === q ? void 0 : q.value, planMethodName: null === q || void 0 === q ? void 0 : q.name }), G(null === q || void 0 === q ? void 0 : q.value) };
                    Object(m["useEffect"])((function() {
                        return g(z.formatMessage({ id: "plan.detail.title" })), k().then(Object(l["a"])(b.a.mark((function e() {
                                var t, n;
                                return b.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return e.next = 2, Object(f["v"])({ id: B });
                                        case 2:
                                            if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                            return e.abrupt("return");
                                        case 5:
                                            if (0 !== t.data.show || 0 !== t.data.renew) { e.next = 8; break }
                                            return j["c"].replace(p["o"]), e.abrupt("return");
                                        case 8:
                                            T(t.data), t.data.prices && t.data.prices.length > 0 && (n = void 0 !== u ? t.data.prices.length - 1 : 0, A(t.data.prices[n]));
                                        case 10:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })))),
                            function() { g("") }
                    }), [B]), Object(m["useEffect"])((function() { void 0 != w.planID && (0 !== (null === C || void 0 === C ? void 0 : C.show) || 1 !== (null === C || void 0 === C ? void 0 : C.renew) || w.planID === Number(B) || j["c"].replace(p["o"])) }), [w.planID]), Object(m["useEffect"])((function() { H() }), [null === q || void 0 === q ? void 0 : q.id]);
                    var K = function(e) {
                            var t, n, a = e.code,
                                r = e.name;
                            if (1 === e.type) t = 100 * e.value, n = V - t;
                            else {
                                if (2 !== e.type) throw Error("wrong coupon code type");
                                t = e.value / 100 * V, n = V - t
                            }
                            R(Object(o["a"])(Object(o["a"])({}, E), {}, { couponName: r, totalAmount: n, discountAmount: t, couponCode: a }))
                        },
                        W = function(e) { return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsxs"])("div", { className: "block block-link-pop block-rounded block-bordered py-3", children: [Object(O["jsx"])("h4", { className: "mb-0 px-3", children: e.name }), Object(O["jsx"])("div", { className: "v2board-plan-content", dangerouslySetInnerHTML: { __html: e.content } })] }) }) },
                        J = function(e, t) { return Object(O["jsxs"])(O["Fragment"], { children: [Object(O["jsx"])("input", { type: "radio", className: "custom-control-input", value: e.id, name: "radio-prices", id: "radop-prices-".concat(e.id), onClick: function() { A(e) }, defaultChecked: t }), Object(O["jsx"])("label", { className: "custom-control-label", htmlFor: "radop-prices-".concat(e.id), children: Object(O["jsxs"])("span", { className: "d-block font-w400 text-center my-2", children: [Object(O["jsx"])("span", { children: Object(O["jsxs"])(s["b"], { children: [e.name, e.tip && e.tip.length > 0 && Object(O["jsx"])(i["a"], { title: e.tip, children: Object(O["jsx"])(N["a"], {}) })] }) }), Object(O["jsx"])("span", { className: "d-block py-1 m-1 bg-body-light rounded ", children: p["f"].format(e.value / 100) })] }) }), Object(O["jsx"])("span", { className: "custom-block-indicator", children: Object(O["jsx"])("i", { className: "fa fa-check" }) })] }) },
                        X = function() { var e; return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsx"])("div", { className: "row mb-2", children: null === C || void 0 === C || null === (e = C.prices) || void 0 === e ? void 0 : e.map((function(e, t) { var n, a; return Object(O["jsx"])("div", { className: "col-md-3", children: Object(O["jsx"])("div", { className: "custom-control custom-block custom-control-primary mb-2", children: e.off_tip ? Object(O["jsx"])(c["a"].Ribbon, { text: e.off_tip, color: "red", placement: "start", children: J(e, void 0 !== u ? t === (null === C || void 0 === C || null === (n = C.prices) || void 0 === n ? void 0 : n.length) - 1 : 0 === t) }) : J(e, void 0 !== u ? t === (null === C || void 0 === C || null === (a = C.prices) || void 0 === a ? void 0 : a.length) - 1 : 0 === t) }) }, e.id) })) }) }) },
                        Q = function() { return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsx"])("div", { className: "row", children: Object(O["jsx"])("div", { className: "col-12", children: Object(O["jsx"])("div", { className: "block block-rounded", children: Object(O["jsx"])("div", { className: "block-content", children: Object(O["jsx"])(a["a"], { title: z.formatMessage({ id: "plan.detail.select_other_btn.title" }), extra: Object(O["jsx"])(r["a"], { type: "primary", onClick: function(e) { e.preventDefault(), j["c"].push("/plan") }, children: z.formatMessage({ id: "plan.detail.select_other_btn" }) }) }) }) }) }) }) }) };
                    return Object(O["jsxs"])("div", { className: "content content-full", children: [Object.keys(w).length > 0 && void 0 !== C && (1 === C.show && 1 === C.renew || w.planID === (null === C || void 0 === C ? void 0 : C.id) && 1 === C.renew) && Object(O["jsxs"])("div", { className: "row", id: "cashier", children: [Object(O["jsxs"])("div", { className: "col-md-8 col-sm-12", children: [C && W(C), Object(O["jsx"])("h3", { className: "font-w300 mt-4 mb-3", children: z.formatMessage({ id: "plan.detail.cycle" }) }), X()] }), Object(O["jsxs"])("div", { className: "col-md-4 col-sm-12", children: [C && Object(O["jsx"])(v, { priceID: null === q || void 0 === q ? void 0 : q.id, planID: null === C || void 0 === C ? void 0 : C.id, onCheckSuccess: K }), E && Object(O["jsx"])(_, Object(o["a"])({}, E))] })] }), Object.keys(w).length > 0 && void 0 !== C && w.planID === C.id && 0 === C.renew && 1 === C.show && Q()] })
                };
            t["default"] = S
        },
        Pqqt: function(e, t, n) {
            "use strict";
            n.r(t);
            n("T2oS");
            var a = n("W9HT"),
                r = n("9og8"),
                c = n("tJVT"),
                s = n("WmNS"),
                i = n.n(s),
                o = (n("790Q"), n("q1tI")),
                l = n("CLrh"),
                d = n("55Ip"),
                u = n("9kvl"),
                b = n("X8fG"),
                m = n("ye1Q"),
                j = n("nKUr"),
                f = function(e) {
                    var t = Object(o["useState"])([]),
                        n = Object(c["a"])(t, 2),
                        s = n[0],
                        f = n[1],
                        p = e.history,
                        h = Object(u["g"])();
                    Object(o["useEffect"])((function() {
                        Object(r["a"])(i.a.mark((function e() {
                            var t;
                            return i.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(l["w"])();
                                    case 2:
                                        if (t = e.sent, void 0 !== t && void 0 !== t.data) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        f(t.data);
                                    case 6:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []);
                    var O = function(e) { var t = null !== e.prices && e.prices.length > 0 ? e.prices[0] : void 0; return Object(j["jsxs"])(j["Fragment"], { children: [void 0 !== t && Object(j["jsx"])("p", { className: "h1 mb-2", children: void 0 !== t && b["f"].format((null === t || void 0 === t ? void 0 : t.value) / 100) }), void 0 !== t && t.name && Object(j["jsx"])("p", { className: "h6 text-muted", children: t.name })] }) },
                        g = function() {
                            return Object(j["jsx"])(j["Fragment"], {
                                children: Object(j["jsx"])("div", {
                                    className: "row",
                                    children: void 0 !== s && s.map((function(e) {
                                        return Object(j["jsx"])("div", {
                                            className: "col-md-6 col-xl-4",
                                            onClick: function(t) {
                                                var n = "/plan/".concat(e.id);
                                                t.preventDefault(), p.push({ pathname: n })
                                            },
                                            children: Object(j["jsxs"])(d["a"], { to: "", className: "block block-link-pop block-rounded p-3 p-sm-0", onClick: function(e) { e.preventDefault() }, children: [Object(j["jsx"])("div", { className: "block-header plan", children: Object(j["jsxs"])("h3", { className: "block-title", children: [" ", e.name] }) }), Object(j["jsx"])("div", { className: "block-content bg-gray-light", children: Object(j["jsx"])("div", { className: "py-2", children: O(e) }) }), Object(j["jsx"])("div", { className: "block-content", children: Object(j["jsx"])("div", { className: "py-3", dangerouslySetInnerHTML: { __html: e.content } }) }), Object(j["jsx"])("div", { className: "block-content block-content-full bg-body-light", children: Object(j["jsxs"])("span", { className: "btn btn-hero-primary btn-rounded px-4", children: [Object(j["jsx"])("i", { className: "fa fa-thumbs-up mr-1" }), h.formatMessage({ id: "plan.now" })] }) })] })
                                        }, e.id)
                                    }))
                                })
                            })
                        };
                    return Object(j["jsx"])(j["Fragment"], { children: Object(j["jsx"])("div", { className: "content content-full", children: void 0 !== s ? g() : Object(j["jsx"])(a["a"], { indicator: Object(j["jsx"])(m["a"], { style: { fontSize: 24 }, spin: !0 }) }) }) })
                };
            t["default"] = f
        },
        QeBL: function(e, t, n) {
            "use strict";
            n.r(t);
            var a = n("9kvl"),
                r = n("q1tI"),
                c = n("nKUr"),
                s = function() { return Object(r["useEffect"])((function() { a["c"].replace("/dashboard") }), []), Object(c["jsx"])(c["Fragment"], {}) };
            t["default"] = s
        },
        R0hO: function(e, t, n) {
            "use strict";
            n("2qtc");
            var a = n("kLXV"),
                r = n("D1Df"),
                c = n.n(r),
                s = n("nKUr"),
                i = function(e) {
                    var t = e.visible,
                        n = e.url,
                        r = e.footer,
                        i = e.title,
                        o = e.onCancel;
                    return Object(s["jsx"])(s["Fragment"], { children: Object(s["jsx"])(a["a"], { title: null !== i && void 0 !== i ? i : null, centered: !0, visible: t, closable: !1, zIndex: 1200, width: 300, footer: null !== r && void 0 !== r ? r : null, onCancel: o, children: Object(s["jsx"])(c.a, { value: n, size: 250, includeMargin: !1, renderAs: "svg" }) }) })
                };
            t["a"] = i
        },
        R5vp: function(e, t, n) {
            "use strict";
            (function(e) {
                var a = n("k1fw"),
                    r = n("9og8"),
                    c = n("tJVT"),
                    s = n("WmNS"),
                    i = n.n(s),
                    o = n("q1tI"),
                    l = n("wd/R"),
                    d = n.n(l),
                    u = n("CLrh"),
                    b = n("QNED"),
                    m = n("X8fG");
                t["a"] = function() {
                    var t = Object(o["useState"])({}),
                        n = Object(c["a"])(t, 2),
                        s = n[0],
                        l = n[1],
                        j = Object(o["useState"])(!1),
                        f = Object(c["a"])(j, 2),
                        p = f[0],
                        h = f[1],
                        O = function(t) {
                            var n = "stash://install-config?url=".concat(t, "&name=").concat(m["r"]),
                                a = "clash://install-config?url=".concat(t, "&name=").concat(m["r"]),
                                r = "surge:///install-config?url=".concat(encodeURIComponent(t), "&name=").concat(encodeURIComponent(m["r"])),
                                c = e.from(t).toString("base64"),
                                s = "shadowrocket://add/sub://".concat(c, "?remark=").concat(m["r"]),
                                i = { server_remote: ["".concat(t, ",tag=").concat(m["r"])] },
                                o = JSON.stringify(i),
                                l = "quantumult-x:///update-configuration?remote-resource=".concat(o.valueOf());
                            return { stashUrl: n, clashUrl: a, surgeUrl: r, shadowrocketUrl: s, quantumultXUrl: l }
                        },
                        g = function() {
                            var e = Object(r["a"])(i.a.mark((function e() {
                                var t, n, r, c, s, o, l, m, j, f, p, h, g, v, x, w, k, _, y, N;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return e.next = 2, Object(u["E"])();
                                        case 2:
                                            if (n = e.sent, void 0 !== n && void 0 !== n.data) { e.next = 5; break }
                                            return e.abrupt("return", void 0);
                                        case 5:
                                            return r = n.data.is_available, c = n.data.plan_id, s = null === n || void 0 === n ? void 0 : n.data.expired_at, o = null !== s ? d.a.unix(null === n || void 0 === n ? void 0 : n.data.expired_at).format("DD/MM/YYYY") : null, l = (null === n || void 0 === n ? void 0 : n.data.u) + (null === n || void 0 === n ? void 0 : n.data.d), m = null === n || void 0 === n ? void 0 : n.data.transfer_enable_value, j = Object(b["a"])(l), f = Object(b["a"])(m), p = null === n || void 0 === n ? void 0 : n.data.reset_day, h = null !== (null === n || void 0 === n ? void 0 : n.data.expired_at) ? d()(d.a.unix(null === n || void 0 === n ? void 0 : n.data.expired_at).toISOString()).diff(d()().toISOString(), "days") : null, g = null !== (null === n || void 0 === n ? void 0 : n.data.expired_at) ? d()(d.a.unix(null === n || void 0 === n ? void 0 : n.data.expired_at).toISOString()).diff(d()().toISOString(), "hours") : null, v = null === n || void 0 === n || null === (t = n.data.plan) || void 0 === t ? void 0 : t.name, x = "".concat(Math.round(l / m * 1e4) / 100), w = null === n || void 0 === n ? void 0 : n.data.subscribe_url, k = null === n || void 0 === n ? void 0 : n.data.time_limit, _ = null === n || void 0 === n ? void 0 : n.data.start_sec, y = null === n || void 0 === n ? void 0 : n.data.end_sec, N = O(w), e.abrupt("return", Object(a["a"])({ isAvailable: r, planID: c, expiredDay: o, expiredAt: s, usedTraffic: j, leftDay: h, leftHour: g, resetDay: p, planName: v, transferTotal: f, percentBar: x, subscribeUrl: w, timeLimit: k, startSec: _, endSec: y }, N));
                                        case 24:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }(),
                        v = function() {
                            var e = Object(r["a"])(i.a.mark((function e() {
                                var t;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return e.next = 2, g();
                                        case 2:
                                            t = e.sent, void 0 !== t && (l(Object(a["a"])({}, t)), h(!0));
                                        case 4:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }(),
                        x = function() {
                            var e = Object(r["a"])(i.a.mark((function e() {
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            !0 !== p && v();
                                        case 1:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return { subState: s, setSubState: l, initSubState: x, refresh: v, fetchSubState: g, generateUrls: O }
                }
            }).call(this, n("tjlA").Buffer)
        },
        SDuW: function(e, t, n) {
            "use strict";
            n.r(t);
            n("Awhp");
            var a = n("KrTs"),
                r = n("9og8"),
                c = n("tJVT"),
                s = (n("g9YV"), n("wCAj")),
                i = n("WmNS"),
                o = n.n(i),
                l = n("q1tI"),
                d = n("CLrh"),
                u = n("wd/R"),
                b = n.n(u),
                m = n("9kvl"),
                j = n("55Ip"),
                f = (n("2qtc"), n("kLXV")),
                p = (n("miYZ"), n("tsqr")),
                h = (n("5NDa"), n("5rEg")),
                O = (n("OaEy"), n("2fM7")),
                g = n("/YUT"),
                v = n.n(g),
                x = n("nKUr"),
                w = O["a"].Option,
                k = h["a"].TextArea,
                _ = function(e) {
                    var t = e.visible,
                        n = e.onChange,
                        a = e.onCancel,
                        s = Object(l["useRef"])(null),
                        i = Object(l["useState"])(""),
                        u = Object(c["a"])(i, 2),
                        b = u[0],
                        j = u[1],
                        g = Object(l["useState"])(!1),
                        _ = Object(c["a"])(g, 2),
                        y = _[0],
                        N = _[1],
                        S = Object(l["useState"])(0),
                        M = Object(c["a"])(S, 2),
                        C = M[0],
                        T = M[1],
                        I = Object(m["g"])(),
                        D = function(e) { j(e.currentTarget.textContent) },
                        E = function(e) { T(e) },
                        R = function() {
                            var e = Object(r["a"])(o.a.mark((function e() {
                                var t, a, r;
                                return o.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return N(!0), a = null === (t = s.current) || void 0 === t ? void 0 : t.input.value, e.next = 4, Object(d["J"])({ subject: a, message: b, level: C });
                                        case 4:
                                            if (r = e.sent, v()(1e3).then((function() { N(!1) })), void 0 !== r) { e.next = 8; break }
                                            return e.abrupt("return");
                                        case 8:
                                            p["default"].success(I.formatMessage({ id: "modal.ticket.create_success" })), n && n();
                                        case 10:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return Object(x["jsx"])(x["Fragment"], { children: Object(x["jsxs"])(f["a"], { title: I.formatMessage({ id: "modal.ticket.title" }), visible: t, onOk: R, onCancel: a, confirmLoading: y, children: [Object(x["jsxs"])("div", { className: "form-group", children: [Object(x["jsx"])("label", { htmlFor: "example-text-input-alt", children: I.formatMessage({ id: "modal.ticket.subject" }) }), Object(x["jsx"])(h["a"], { placeholder: I.formatMessage({ id: "modal.ticket.enter_jubject" }), ref: s, type: "text", className: "ant-input" })] }), Object(x["jsxs"])("div", { className: "form-group", children: [Object(x["jsx"])("label", { children: I.formatMessage({ id: "modal.ticket.level" }) }), Object(x["jsx"])("div", { children: Object(x["jsxs"])(O["a"], { style: { width: "100%" }, placeholder: I.formatMessage({ id: "modal.ticket.enter_level" }), onChange: E, children: [Object(x["jsx"])(w, { value: "0", children: I.formatMessage({ id: "modal.ticket.level.low" }) }), Object(x["jsx"])(w, { value: "1", children: I.formatMessage({ id: "modal.ticket.level.medium" }) }), Object(x["jsx"])(w, { value: "2", children: I.formatMessage({ id: "modal.ticket.level.high" }) })] }) }), Object(x["jsxs"])("div", { className: "form-group", children: [Object(x["jsx"])("label", { htmlFor: "example-text-input-alt", children: I.formatMessage({ id: "modal.ticket.message" }) }), Object(x["jsx"])(k, { onChange: D, rows: 5, placeholder: I.formatMessage({ id: "modal.ticket.enter_message" }) })] })] })] }) })
                },
                y = _,
                N = s["a"].Column,
                S = function() {
                    var e = Object(l["useState"])(),
                        t = Object(c["a"])(e, 2),
                        n = t[0],
                        i = t[1],
                        u = Object(l["useState"])(0),
                        f = Object(c["a"])(u, 2),
                        p = f[0],
                        h = f[1],
                        O = Object(l["useState"])(!1),
                        g = Object(c["a"])(O, 2),
                        v = g[0],
                        w = g[1],
                        k = Object(l["useState"])(!1),
                        _ = Object(c["a"])(k, 2),
                        S = _[0],
                        M = _[1],
                        C = Object(l["useState"])(!1),
                        T = Object(c["a"])(C, 2),
                        I = T[0],
                        D = T[1],
                        E = Object(m["g"])(),
                        R = function() { M(!0), D(!1) },
                        F = function() { D(!1) },
                        P = function(e) {
                            var t = Object(d["H"])({ id: e });
                            void 0 !== t && w(!0)
                        },
                        q = function() { D(!0) },
                        A = function(e) {
                            var t = "".concat(window.location.origin, "/#/ticket/").concat(e),
                                n = 800,
                                a = 600,
                                r = 0,
                                c = 0,
                                s = "scrollbars=0,status=0,menubar=0,resizable=2,location=0",
                                i = "top=".concat(r, ",left=").concat(c, ",width=").concat(n, ",height=").concat(a, ",").concat(s);
                            window.open(t, "", i)
                        };
                    return Object(l["useEffect"])((function() {
                        Object(r["a"])(o.a.mark((function e() {
                            var t;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(d["L"])();
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        i(t.data), h(t.data.length), w(!1), M(!1);
                                    case 9:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), [v, S]), Object(x["jsxs"])(x["Fragment"], { children: [Object(x["jsx"])("div", { className: "content content-full", children: Object(x["jsxs"])("div", { className: "block block-rounded js-appear-enabled ", children: [Object(x["jsxs"])("div", { className: "block-header block-header-default", children: [Object(x["jsx"])("h3", { className: "block-title", children: E.formatMessage({ id: "ticket.history" }) }), Object(x["jsx"])("div", { className: "block-options", children: Object(x["jsx"])("button", { type: "button", className: "btn btn-primary btn-sm btn-primary btn-rounded px-3", onClick: function(e) { e.preventDefault(), q() }, children: E.formatMessage({ id: "ticket.new_btn" }) }) })] }), Object(x["jsx"])("div", { className: "block-content p-0", children: Object(x["jsxs"])(s["a"], { dataSource: n, pagination: !1, rowKey: "id", bordered: !1, loading: !1, children: [Object(x["jsx"])(N, { title: "#", dataIndex: "index", render: function(e, t, n) { return p - n } }), Object(x["jsx"])(N, { title: E.formatMessage({ id: "ticket.column.subject" }), dataIndex: "subject", render: function(e, t) { return Object(x["jsx"])(j["a"], { to: "#", onClick: function(e) { e.preventDefault(), A(t.id) }, children: e }) } }, "subject"), Object(x["jsx"])(N, { title: E.formatMessage({ id: "ticket.column.level" }), dataIndex: "level", render: function(e) { return Object(x["jsxs"])(x["Fragment"], { children: [2 === e && E.formatMessage({ id: "ticket.column.level.high" }), 1 === e && E.formatMessage({ id: "ticket.column.level.medium" }), 0 === e && E.formatMessage({ id: "ticket.column.level.low" })] }) }, responsive: ["lg", "md"] }, "subject"), Object(x["jsx"])(N, { title: E.formatMessage({ id: "ticket.column.status" }), dataIndex: "status", render: function(e, t) { return Object(x["jsxs"])(x["Fragment"], { children: [0 === e && (0 === t.last_reply_user_id || t.last_reply_user_id === t.user_id) && Object(x["jsxs"])(x["Fragment"], { children: [Object(x["jsx"])(a["a"], { status: "error" }), E.formatMessage({ id: "ticket.column.status.not_reply" })] }), 1 === e && Object(x["jsxs"])(x["Fragment"], { children: [Object(x["jsx"])(a["a"], { status: "success" }), E.formatMessage({ id: "ticket.column.status.closed" })] }), 1 !== e && t.last_reply_user_id > 0 && t.last_reply_user_id != t.user_id && Object(x["jsxs"])(x["Fragment"], { children: [Object(x["jsx"])(a["a"], { status: "processing" }), E.formatMessage({ id: "ticket.column.status.replied" })] })] }) } }, "status"), Object(x["jsx"])(N, { title: E.formatMessage({ id: "common.column.created_at" }), dataIndex: "created_at", render: function(e) { return b.a.unix(Number(e)).format("DD/MM/YYYY HH:mm") }, responsive: ["lg", "md"] }, "created_At"), Object(x["jsx"])(N, { title: E.formatMessage({ id: "ticket.column.updated_at" }), dataIndex: "updated_at", render: function(e) { return b.a.unix(Number(e)).format("DD/MM/YYYY HH:mm") }, responsive: ["lg", "md"] }, "updated_At"), Object(x["jsx"])(N, { title: E.formatMessage({ id: "common.column.operation" }), render: function(e, t) { return Object(x["jsx"])(x["Fragment"], { children: Object(x["jsx"])("div", { children: Object(x["jsx"])(j["a"], { disabled: 0 !== t.status, to: "#", onClick: function(e) { e.preventDefault(), P(t.id) }, children: E.formatMessage({ id: "ticket.column.operation.close" }) }) }) }) } })] }) })] }) }), Object(x["jsx"])(y, { visible: I, onCancel: F, onChange: R })] })
                };
            t["default"] = S
        },
        SboD: function(e, t, n) {
            "use strict";
            n.r(t);
            var a = n("k1fw"),
                r = n("9og8"),
                c = (n("miYZ"), n("tsqr")),
                s = n("tJVT"),
                i = n("WmNS"),
                o = n.n(i),
                l = n("q1tI"),
                d = (n("DYRE"), n("zeV3")),
                u = (n("5Dmo"), n("3S7+")),
                b = n("X8fG"),
                m = n("Lyp1"),
                j = n("9kvl"),
                f = n("55Ip"),
                p = n("nKUr"),
                h = function(e) {
                    var t = e.registered,
                        n = e.commissionPendingBalance,
                        a = e.commissionRate,
                        r = Object(j["g"])();
                    return Object(p["jsx"])(p["Fragment"], { children: Object(p["jsxs"])("div", { className: "row", children: [Object(p["jsx"])("div", { className: "col-12 col-sm-12 col-lg-4 js-appear-enabled", children: Object(p["jsx"])("div", { className: "block block-rounded text-center", children: Object(p["jsx"])("div", { className: "block-content block-content-full d-flex justify-content-center align-items-center", children: Object(p["jsxs"])("div", { children: [Object(p["jsx"])(f["a"], { className: "text-success font-size-h1 font-w700", to: "", onClick: function(e) { e.preventDefault() }, children: t }), Object(p["jsx"])("div", { className: "font-size-sm text-uppercase text-muted mt-1", children: r.formatMessage({ id: "invite.stat.registerd" }) })] }) }) }) }), Object(p["jsx"])("div", { className: "col-12 col-sm-12 col-lg-4 js-appear-enabled", children: Object(p["jsx"])("div", { className: "block block-rounded text-center", children: Object(p["jsx"])("div", { className: "block-content block-content-full d-flex justify-content-center align-items-center", children: Object(p["jsxs"])("div", { children: [Object(p["jsxs"])(f["a"], { className: "text-success font-size-h1 font-w700", to: "", onClick: function(e) { e.preventDefault() }, children: [a, "%"] }), Object(p["jsx"])("div", { className: "font-size-sm text-uppercase text-muted mt-1", children: r.formatMessage({ id: "invite.stat.commission_rate" }) })] }) }) }) }), Object(p["jsx"])("div", { className: "col-12 col-sm-12 col-lg-4 js-appear-enabled", children: Object(p["jsx"])("div", { className: "block block-rounded text-center", children: Object(p["jsx"])("div", { className: "block-content block-content-full d-flex justify-content-center align-items-center", children: Object(p["jsxs"])("div", { children: [Object(p["jsx"])(f["a"], { className: "text-success font-size-h1 font-w700", to: "#", onClick: function(e) { e.preventDefault() }, children: b["f"].format(n / 100) }), Object(p["jsx"])("div", { className: "font-size-sm text-uppercase text-muted mt-1", children: Object(p["jsxs"])(d["b"], { children: [r.formatMessage({ id: "invite.stat.commission_pending_balance" }), Object(p["jsx"])(u["a"], { title: r.formatMessage({ id: "invite.stat.commission_pending_balance.tip" }), children: Object(p["jsx"])(m["a"], {}) })] }) })] }) }) }) })] }) })
                },
                O = h,
                g = n("CLrh"),
                v = (n("+L6B"), n("2/Rp")),
                x = (n("g9YV"), n("wCAj")),
                w = n("wd/R"),
                k = n.n(w),
                _ = n("k1tg"),
                y = n("/YUT"),
                N = n.n(y),
                S = x["a"].Column,
                M = function(e) {
                    var t = e.hiddenGenerateButton,
                        n = e.dataSource,
                        a = e.onGenerateSuccess,
                        i = Object(l["useState"])(!1),
                        d = Object(s["a"])(i, 2),
                        u = d[0],
                        b = d[1],
                        m = Object(j["g"])(),
                        h = function() {
                            var e = Object(r["a"])(o.a.mark((function e() {
                                var t;
                                return o.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return e.next = 2, Object(g["g"])();
                                        case 2:
                                            t = e.sent, void 0 !== t && a();
                                        case 4:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return Object(p["jsx"])(p["Fragment"], {
                        children: Object(p["jsxs"])("div", {
                            className: "block block-rounded js-appear-enabled ",
                            children: [Object(p["jsxs"])("div", { className: "block-header block-header-default", children: [Object(p["jsx"])("h3", { className: "block-title", children: m.formatMessage({ id: "invite.manager.title" }) }), !t && Object(p["jsx"])("div", { className: "block-options", children: Object(p["jsx"])(v["a"], { type: "primary", shape: "round", loading: u, onClick: function(e) { b(!0), e.preventDefault(), h(), N()(1e3).then((function() { b(!1) })) }, children: m.formatMessage({ id: "invite.mangaer.generate_btn" }) }) })] }), Object(p["jsx"])("div", {
                                className: "block-content p-0",
                                children: Object(p["jsxs"])(x["a"], {
                                    rowKey: "id",
                                    pagination: !1,
                                    dataSource: n,
                                    scroll: { x: !0 },
                                    bordered: !1,
                                    loading: !1,
                                    children: [Object(p["jsx"])(S, { title: m.formatMessage({ id: "invite.manager.column.invite_code" }), dataIndex: "code" }, "code"), Object(p["jsx"])(S, { title: m.formatMessage({ id: "common.column.created_at" }), dataIndex: "created_at", render: function(e) { return Object(p["jsx"])(p["Fragment"], { children: k.a.unix(Number(e)).format("DD/MM/YYYY HH:mm") }) } }, "created_at"), Object(p["jsx"])(S, {
                                        title: m.formatMessage({ id: "common.column.operation" }),
                                        align: "right",
                                        render: function(e) {
                                            return Object(p["jsx"])(p["Fragment"], {
                                                children: Object(p["jsx"])(f["a"], {
                                                    to: "",
                                                    onClick: function(t) {
                                                        t.preventDefault();
                                                        var n = "".concat(window.location.origin, "/#/register?code=").concat(e.code);
                                                        Object(_["a"])(n), c["default"].success(m.formatMessage({ id: "common.message.copy_success" }))
                                                    },
                                                    children: m.formatMessage({ id: "invite.manager.copy_link" })
                                                })
                                            })
                                        }
                                    })]
                                })
                            })]
                        })
                    })
                },
                C = M,
                T = x["a"].Column,
                I = function() {
                    var e = Object(j["g"])(),
                        t = Object(l["useState"])(),
                        n = Object(s["a"])(t, 2),
                        a = n[0],
                        c = n[1],
                        i = Object(l["useState"])(0),
                        d = Object(s["a"])(i, 2),
                        u = d[0],
                        m = d[1],
                        f = Object(l["useState"])(1),
                        h = Object(s["a"])(f, 2),
                        O = h[0],
                        v = h[1],
                        w = 10,
                        _ = function(e) {
                            if (void 0 !== O) {
                                var t = e.current;
                                v(t)
                            }
                        },
                        y = { pageSize: w, showQuickJumper: !1, showLessItems: !1, showSizeChanger: !1, showTitle: !1, total: u, hideOnSinglePage: !0, size: "small" };
                    return Object(l["useEffect"])((function() {
                        Object(r["a"])(o.a.mark((function e() {
                            var t;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(g["h"])({ pageSize: w, current: O });
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        c(t.data), m(t.total);
                                    case 7:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), [O]), Object(p["jsx"])(p["Fragment"], { children: Object(p["jsxs"])("div", { className: "block block-rounded js-appear-enabled ", children: [Object(p["jsx"])("div", { className: "block-header block-header-default", children: Object(p["jsx"])("h3", { className: "block-title", children: e.formatMessage({ id: "invite.list.title" }) }) }), Object(p["jsx"])("div", { className: "block-content p-0", children: Object(p["jsxs"])(x["a"], { rowKey: "id", dataSource: a, scroll: { x: !0 }, bordered: !1, loading: !1, pagination: y, onChange: _, children: [Object(p["jsx"])(T, { title: "#", dataIndex: "id", render: function(e, t, n) { return Object(p["jsx"])(p["Fragment"], { children: n + 1 }) } }), Object(p["jsx"])(T, { title: e.formatMessage({ id: "invite.list.column.updated_at" }), dataIndex: "updated_at", render: function(e) { return Object(p["jsx"])(p["Fragment"], { children: k.a.unix(Number(e)).format("DD/MM/YYYY HH:mm") }) } }, "updated_at"), Object(p["jsx"])(T, { title: e.formatMessage({ id: "invite.list.column.total_amount" }), dataIndex: "total_amount", render: function(e) { return Object(p["jsx"])(p["Fragment"], { children: b["f"].format(e / 100) }) } }, "total_amount"), Object(p["jsx"])(T, { title: e.formatMessage({ id: "invite.list.column.commission_rate" }), dataIndex: "commission_rate", render: function(e) { return Object(p["jsx"])(p["Fragment"], { children: e ? e + "%" : "-" }) } }, "commission_rate"), Object(p["jsx"])(T, { title: e.formatMessage({ id: "invite.list.column.commission_balance" }), dataIndex: "commission_balance", render: function(e) { return Object(p["jsx"])(p["Fragment"], { children: b["f"].format(e / 100) }) } }, "commission_balance"), Object(p["jsx"])(T, { title: e.formatMessage({ id: "invite.list.column.commission_status" }), dataIndex: "commission_status", align: "right", render: function(t) { return Object(p["jsxs"])(p["Fragment"], { children: [0 === t && e.formatMessage({ id: "invite.list.column.commission_status.new" }), 1 === t && e.formatMessage({ id: "invite.list.column.commission_status.pending" }), 2 === t && e.formatMessage({ id: "invite.list.column.commission_status.valid" }), 3 === t && e.formatMessage({ id: "invite.list.column.commission_status.invalid" })] }) } }, "commission_status")] }) })] }) })
                },
                D = I,
                E = function() {
                    var e = Object(l["useState"])(),
                        t = Object(s["a"])(e, 2),
                        n = t[0],
                        i = t[1],
                        d = Object(l["useState"])(),
                        u = Object(s["a"])(d, 2),
                        b = u[0],
                        m = u[1],
                        f = Object(l["useState"])(!1),
                        h = Object(s["a"])(f, 2),
                        v = h[0],
                        x = h[1],
                        w = Object(l["useState"])(!1),
                        k = Object(s["a"])(w, 2),
                        _ = k[0],
                        y = k[1],
                        N = Object(l["useState"])(),
                        S = Object(s["a"])(N, 2),
                        M = S[0],
                        T = S[1],
                        I = Object(j["g"])(),
                        E = function() { c["default"].success(I.formatMessage({ id: "invite.generated" })), x(!0), M && b && M - b.length === 1 && y(!0) };
                    return Object(l["useEffect"])((function() {
                        Object(r["a"])(o.a.mark((function e() {
                            var t, n, a, r, c, l;
                            return o.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(g["f"])();
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        return T(t.data.invite_gen_limit), e.next = 8, Object(g["i"])();
                                    case 8:
                                        if (n = e.sent, void 0 !== n) { e.next = 11; break }
                                        return e.abrupt("return");
                                    case 11:
                                        t.data.invite_gen_limit <= n.data.codes.length && y(!0), m(n.data.codes), a = Object(s["a"])(n.data.stat, 5), r = a[0], c = a[2], l = a[3], a[4], i({ registered: r, commissionPendingBalance: c, commissionRate: l }), x(!1);
                                    case 16:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), [v]), Object(p["jsx"])(p["Fragment"], { children: Object(p["jsxs"])("div", { className: "content content-full", children: [n && Object(p["jsx"])(O, Object(a["a"])({}, n)), b && Object(p["jsx"])(C, { dataSource: b, onGenerateSuccess: E, hiddenGenerateButton: _ }), Object(p["jsx"])(D, {})] }) })
                };
            t["default"] = E
        },
        T0xp: function(e, t, n) {
            "use strict";
            n("2qtc");
            var a = n("kLXV"),
                r = n("yjgI"),
                c = n.n(r),
                s = n("q1tI"),
                i = n("nKUr"),
                o = function(e) {
                    var t = e.visible,
                        n = e.sitekey,
                        r = e.type,
                        o = e.onCancel,
                        l = e.onVerified,
                        d = Object(s["useRef"])(null),
                        u = function(e) { l(e, r) };
                    return Object(s["useEffect"])((function() { var e;!1 === t && (null === (e = d.current) || void 0 === e || e.reset()) }), [t]), Object(i["jsx"])(i["Fragment"], { children: Object(i["jsx"])(a["a"], { footer: null, visible: t, closable: !1, centered: !0, onCancel: o, children: Object(i["jsx"])(c.a, { ref: d, sitekey: n, onVerify: u }) }) })
                };
            t["a"] = o
        },
        Tems: function(e, t, n) {},
        "Ts/n": function(e, t, n) {
            "use strict";
            n.r(t);
            n("J+/v");
            var a = n("MoRW"),
                r = n("k1fw"),
                c = (n("miYZ"), n("tsqr")),
                s = n("9og8"),
                i = n("tJVT"),
                o = n("WmNS"),
                l = n.n(o),
                d = (n("Eah8"), n("9kvl")),
                u = n("q1tI"),
                b = n("CLrh"),
                m = n("X8fG"),
                j = n("wd/R"),
                f = n.n(j),
                p = n("ye1Q"),
                h = n("nKUr"),
                O = function(e) {
                    var t = Object(u["useState"])(!1),
                        n = Object(i["a"])(t, 2),
                        a = n[0],
                        r = n[1],
                        c = Object(d["g"])(),
                        o = e.tradeNo,
                        j = e.paymentID,
                        f = e.planAmount,
                        O = e.planName,
                        g = e.priceName,
                        v = e.discountAmount,
                        x = e.totalAmount,
                        w = e.onPaymentSuccess,
                        k = function() {
                            var e = Object(s["a"])(l.a.mark((function e() {
                                var t;
                                return l.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return r(!0), e.next = 3, Object(b["r"])({ trade_no: o, method: j });
                                        case 3:
                                            t = e.sent, void 0 !== t && w(t), r(!1);
                                        case 6:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return Object(h["jsx"])(h["Fragment"], { children: Object(h["jsx"])("div", { className: "col-md-4 col-sm-12", children: Object(h["jsxs"])("div", { className: "block block-link-pop block-rounded block-bordered px-3 py-3 text-light", style: { background: "rgb(53, 56, 61)" }, children: [Object(h["jsx"])("h5", { className: "text-light mb-3", children: c.formatMessage({ id: "order.detail.operation.total" }) }), O && g && Object(h["jsxs"])("div", { className: "row no-gutters pb-3", style: { borderBottom: "1px solid rgb(100, 102, 105)" }, children: [Object(h["jsxs"])("div", { className: "col-8", children: [O, " x ", g] }), Object(h["jsx"])("div", { className: "col-4 text-right", children: f && m["f"].format(f / 100) })] }), v && Object(h["jsxs"])("div", { children: [Object(h["jsx"])("div", { className: "pt-3", style: { color: "rgb(100, 102, 105)" }, children: c.formatMessage({ id: "order.detail.operation.discount" }) }), Object(h["jsxs"])("div", { className: "row no-gutters py-3", style: { borderBottom: "1px solid rgb(100, 102, 105)" }, children: [Object(h["jsx"])("div", { className: "col-8" }), Object(h["jsx"])("div", { className: "col-4 text-right", children: m["f"].format(v / 100) })] })] }), Object(h["jsx"])("div", { className: "pt-3", style: { color: "rgb(100, 102, 105)" }, children: c.formatMessage({ id: "order.detail.operation.amount_to" }) }), Object(h["jsx"])("h1", { className: "text-light mt-3 mb-3", children: m["f"].format(x / 100) }), Object(h["jsxs"])("button", { type: "button", className: "btn btn-block btn-primary", onClick: function(e) { e.preventDefault(), k() }, disabled: a, children: [a && Object(h["jsx"])("span", { children: Object(h["jsx"])(p["a"], { style: { fontSize: 24 } }) }), !a && Object(h["jsxs"])("span", { children: [Object(h["jsx"])("i", { className: "far fa-check-circle" }), c.formatMessage({ id: "order.detail.operation.check_out" })] })] })] }) }) })
                },
                g = O,
                v = n("L0Pg"),
                x = n("kMsK"),
                w = n("Y0UT"),
                k = n("YOho"),
                _ = n("REhr"),
                y = n("5Rif"),
                N = n("R0hO"),
                S = n("/YUT"),
                M = n.n(S),
                C = function(e) {
                    var t = e.match,
                        n = e.history,
                        o = Object(d["h"])("useMenuModel"),
                        j = o.setMenuName,
                        p = Object(d["h"])("useSubModel"),
                        O = p.refresh,
                        S = Object(u["useState"])(),
                        C = Object(i["a"])(S, 2),
                        T = C[0],
                        I = C[1],
                        D = Object(u["useState"])(),
                        E = Object(i["a"])(D, 2),
                        R = E[0],
                        F = E[1],
                        P = Object(u["useState"])(),
                        q = Object(i["a"])(P, 2),
                        A = q[0],
                        U = q[1],
                        L = Object(u["useState"])(!1),
                        V = Object(i["a"])(L, 2),
                        G = V[0],
                        Y = V[1],
                        B = Object(u["useState"])(null),
                        z = Object(i["a"])(B, 2),
                        H = z[0],
                        K = z[1],
                        W = Object(u["useState"])(!1),
                        J = Object(i["a"])(W, 2),
                        X = J[0],
                        Q = J[1],
                        Z = Object(u["useState"])(""),
                        $ = Object(i["a"])(Z, 2),
                        ee = $[0],
                        te = $[1],
                        ne = 3e3,
                        ae = t.params,
                        re = ae.id,
                        ce = Object(d["g"])(),
                        se = function() {
                            var e = Object(s["a"])(l.a.mark((function e() {
                                var t;
                                return l.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return T && (null === T || void 0 === T ? void 0 : T.status) in [0, 1] === !1 && K(null), e.next = 3, Object(b["q"])({ trade_no: re });
                                        case 3:
                                            if (t = e.sent, void 0 !== se) { e.next = 6; break }
                                            return e.abrupt("return");
                                        case 6:
                                            t.data !== (null === T || void 0 === T ? void 0 : T.status) && Y(!0), 3 === t.data && O();
                                        case 8:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    Object(v["a"])(se, H, { immediate: !1 }), Object(x["a"])((function() { K(null), j("") }));
                    var ie = function(e) {
                        if (-1 !== e.type || !0 !== e.data) {
                            if (1 === e.type) { var t = e.data; return c["default"].info(ce.formatMessage({ id: "order.detail.messager.info" })), void M()(1e3).then((function() { window.location.href = t })) }
                            0 === e.type && (te(e.data), Q(!0))
                        } else Y(!0)
                    };
                    Object(u["useEffect"])((function() {
                        !1 === G && void 0 !== T || (j(ce.formatMessage({ id: "order.detail.title" })), Object(s["a"])(l.a.mark((function e() {
                            var t;
                            return l.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(b["o"])({ trade_no: re });
                                    case 2:
                                        if (t = e.sent, void 0 !== t && void 0 !== t.data) { e.next = 6; break }
                                        return n.replace(m["o"]), e.abrupt("return");
                                    case 6:
                                        I(t.data), Y(!1);
                                    case 8:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))())
                    }), [re, G]), Object(u["useEffect"])((function() {
                        0 === (null === T || void 0 === T ? void 0 : T.status) && Object(s["a"])(l.a.mark((function e() {
                            var t, n, a;
                            return l.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(b["u"])();
                                    case 2:
                                        if (a = e.sent, void 0 !== a && void 0 !== a.data && 0 !== a.data.length) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        F(a.data), U({ tradeNo: re, paymentID: a.data[0].id, planName: null === (t = T.plan) || void 0 === t ? void 0 : t.name, priceName: T.price_name, totalAmount: T.total_amount, discountAmount: T.discount_amount, planAmount: null === (n = T.price_meta) || void 0 === n ? void 0 : n.value, onPaymentSuccess: ie });
                                    case 7:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))(), T && T.status in [0, 1] && K(ne), T && 0 !== T.status && Q(!1)
                    }), [null === T || void 0 === T ? void 0 : T.status]);
                    var oe = function() {
                            var e = Object(s["a"])(l.a.mark((function e(t) {
                                var n;
                                return l.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return e.next = 2, Object(b["p"])({ trade_no: t });
                                        case 2:
                                            if (n = e.sent, void 0 !== b["p"] && !0 === n.data) { e.next = 5; break }
                                            return e.abrupt("return");
                                        case 5:
                                            Y(!0);
                                        case 6:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function(t) { return e.apply(this, arguments) }
                        }(),
                        le = function(e) { void 0 !== R && void 0 !== typeof R[e] && A && U(Object(r["a"])(Object(r["a"])({}, A), {}, { paymentID: e })) },
                        de = function() { return Object(h["jsx"])(h["Fragment"], { children: Object(h["jsx"])("div", { className: "block block-rounded", children: Object(h["jsxs"])("div", { className: "block-content pt-0", children: [1 === (null === T || void 0 === T ? void 0 : T.status) && Object(h["jsx"])(a["a"], { title: ce.formatMessage({ id: "common.order.status.pending" }), className: "py-4", subTitle: ce.formatMessage({ id: "order.detail.status.pending.subtitle" }) }), 3 === (null === T || void 0 === T ? void 0 : T.status) && Object(h["jsx"])(a["a"], { status: "success", title: ce.formatMessage({ id: "common.order.status.completed" }), className: "py-4", subTitle: ce.formatMessage({ id: "order.detail.status.completed.subtitle" }) }), 2 === (null === T || void 0 === T ? void 0 : T.status) && Object(h["jsx"])(a["a"], { status: "warning", title: ce.formatMessage({ id: "common.order.status.cancelled" }), className: "py-4", subTitle: ce.formatMessage({ id: "order.detail.status.cancelled.subtitle" }) })] }) }) }) },
                        ue = function() { return Object(h["jsxs"])(h["Fragment"], { children: [Object(h["jsx"])("h3", { className: "font-w300 mt-4 mb-3", children: ce.formatMessage({ id: "order.detail.payment_method" }) }), Object(h["jsx"])("div", { className: "row ", children: null === R || void 0 === R ? void 0 : R.map((function(e) { return Object(h["jsx"])("div", { className: "col-md-3 mb-3", children: Object(h["jsxs"])("div", { className: "custom-control custom-block custom-control-info", children: [Object(h["jsx"])("input", { type: "radio", className: "custom-control-input", id: "radio-payment-".concat(e.id), name: "radio-payments", defaultChecked: e.id === R[0].id, value: e.id, onClick: function(e) { le(Number(e.currentTarget.value).valueOf()) } }), Object(h["jsx"])("label", { className: "custom-control-label", htmlFor: "radio-payment-".concat(e.id), children: Object(h["jsxs"])("span", { className: "d-block text-center", children: [1 === e.icon_type && Object(h["jsx"])(w["a"], {}), 2 === e.icon_type && Object(h["jsx"])(k["a"], {}), 3 === e.icon_type && Object(h["jsx"])(_["a"], {}), 4 === e.icon_type && Object(h["jsx"])(y["a"], {}), e.name] }) }), Object(h["jsx"])("span", { className: "custom-block-indicator", children: Object(h["jsx"])("i", { className: "fa fa-check" }) })] }) }, e.id) })) })] }) },
                        be = function() { var e, t; return Object(h["jsx"])(h["Fragment"], { children: Object(h["jsx"])("div", { className: "content content-full", children: Object(h["jsxs"])("div", { className: "row", id: "cashier", children: [Object(h["jsxs"])("div", { className: 0 === (null === T || void 0 === T ? void 0 : T.status) ? "col-md-8 col-sm-12" : "col-12", children: [0 !== (null === T || void 0 === T ? void 0 : T.status) && de(), 6 !== (null === T || void 0 === T ? void 0 : T.type) && Object(h["jsxs"])("div", { className: "block block-rounded", children: [Object(h["jsx"])("div", { className: "block-header block-header-default", children: Object(h["jsx"])("h3", { className: "block-title v2board-trade-no", children: ce.formatMessage({ id: "order.detail.plan_title" }) }) }), Object(h["jsx"])("div", { className: "block-content pb-4", children: Object(h["jsxs"])("div", { className: "v2board-order-info", children: [Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "order.detail.plan_name" }), "\uff1a"] }), Object(h["jsx"])("span", { children: null === T || void 0 === T || null === (e = T.plan) || void 0 === e ? void 0 : e.name })] }), Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "order.detail.price_name" }), "\uff1a"] }), Object(h["jsx"])("span", { children: null === T || void 0 === T ? void 0 : T.price_name })] }), Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "order.detail.plan_transter_enable" }), "\uff1a"] }), Object(h["jsxs"])("span", { children: [null === T || void 0 === T || null === (t = T.plan) || void 0 === t ? void 0 : t.transfer_enable, " GB"] })] })] }) })] }), Object(h["jsxs"])("div", { className: "block block-rounded", children: [Object(h["jsxs"])("div", { className: "block-header block-header-default", children: [Object(h["jsx"])("h3", { className: "block-title v2board-trade-no", children: ce.formatMessage({ id: "order.detail.order_title" }) }), 0 === (null === T || void 0 === T ? void 0 : T.status) && Object(h["jsx"])("div", { className: "block-options", children: Object(h["jsx"])("button", { type: "button", className: "btn btn-primary btn-sm btn-danger btn-rounded px-3", onClick: function(e) { e.preventDefault(), oe(T.trade_no) }, children: ce.formatMessage({ id: "order.detail.order_close_btn" }) }) })] }), Object(h["jsx"])("div", { className: "block-content pb-4", children: Object(h["jsxs"])("div", { className: "v2board-order-info", children: [Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "order.detail.order_trade_no" }), "\uff1a"] }), Object(h["jsx"])("span", { children: null === T || void 0 === T ? void 0 : T.trade_no })] }), (null === T || void 0 === T ? void 0 : T.callback_no) && Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "order.detail.order_callback_no" }), "\uff1a"] }), Object(h["jsx"])("span", { children: null === T || void 0 === T ? void 0 : T.callback_no })] }), (null === T || void 0 === T ? void 0 : T.discount_amount) && Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "order.detail.order_discount_amount" }), "\uff1a"] }), Object(h["jsx"])("span", { children: m["f"].format(T.discount_amount / 100) })] }), (null === T || void 0 === T ? void 0 : T.balance_amount) && Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "order.detail.order_balance_payment" }), "\uff1a"] }), Object(h["jsx"])("span", { children: m["f"].format(T.balance_amount / 100) })] }), (null === T || void 0 === T ? void 0 : T.paid_at) && Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "order.detail.order_paid_at" }), "\uff1a"] }), Object(h["jsx"])("span", { children: (null === T || void 0 === T ? void 0 : T.paid_at) && f.a.unix(Number(T.paid_at)).format("DD-MM-YYYY HH:mm:ss") })] }), Object(h["jsxs"])("div", { children: [Object(h["jsxs"])("span", { children: [ce.formatMessage({ id: "common.column.created_at" }), "\uff1a"] }), Object(h["jsx"])("span", { children: (null === T || void 0 === T ? void 0 : T.created_at) && f.a.unix(Number(T.created_at)).format("DD-MM-YYYY HH:mm:ss") })] })] }) })] }), 0 === (null === T || void 0 === T ? void 0 : T.status) && ue()] }), 0 === (null === T || void 0 === T ? void 0 : T.status) && A && Object(h["jsx"])(g, Object(r["a"])({}, A))] }) }) }) };
                    return Object(h["jsxs"])(h["Fragment"], { children: [be(), Object(h["jsx"])(N["a"], { url: ee, visible: X, footer: Object(h["jsx"])("div", { style: { textAlign: "center" }, children: ce.formatMessage({ id: "modal.qrcode.waiting" }) }) })] })
                };
            t["default"] = C
        },
        X8fG: function(e, t, n) {
            "use strict";
            var a, r, c, s, i, o, l, d, u, b, m, j, f, p, h, O, g, v, x, w;
            n.d(t, "n", (function() { return k })), n.d(t, "p", (function() { return _ })), n.d(t, "o", (function() { return y })), n.d(t, "h", (function() { return N })), n.d(t, "k", (function() { return C })), n.d(t, "j", (function() { return T })), n.d(t, "r", (function() { return I })), n.d(t, "g", (function() { return D })), n.d(t, "s", (function() { return E })), n.d(t, "e", (function() { return R })), n.d(t, "c", (function() { return F })), n.d(t, "q", (function() { return P })), n.d(t, "i", (function() { return q })), n.d(t, "d", (function() { return A })), n.d(t, "b", (function() { return U })), n.d(t, "a", (function() { return L })), n.d(t, "m", (function() { return V })), n.d(t, "l", (function() { return G })), n.d(t, "f", (function() { return Y }));
            var k = "/login",
                _ = "/register",
                y = "/404",
                N = "/forget",
                S = [k, _, y, N],
                M = [/^\/forget$/, /^\/register$/, /^\/login$/, /^\/ticket\/.+/, /^\/404$/],
                C = function(e) { for (var t = !1, n = 0; n < M.length; n += 1) { var a = M[n]; if (e.match(a)) { t = !0; break } } return t },
                T = function(e) { return S.includes(e) },
                I = null !== (a = null === (r = window.settings) || void 0 === r ? void 0 : r.title) && void 0 !== a ? a : "v2board",
                D = null !== (c = null === (s = window.settings) || void 0 === s ? void 0 : s.description) && void 0 !== c ? c : "v2board is best",
                E = null !== (i = window.settings) && void 0 !== i && i.version ? null === (o = window.settings) || void 0 === o || null === (l = o.version) || void 0 === l ? void 0 : l.split(".").slice(0, 3).join(".") : "1.10.25",
                R = "\u0073\u0068\u006f\u0070\u0076\u0070\u006e\u002e\u006e\u0065\u0074 \u005a\u005f\u004f\u0056",
                F = null !== (d = null === (u = window.settings) || void 0 === u ? void 0 : u.background_url) && void 0 !== d ? d : void 0,
                P = null !== (b = null === (m = window.settings) || void 0 === m || null === (j = m.theme) || void 0 === j ? void 0 : j.sidebar) && void 0 !== b ? b : "light",
                q = null !== (f = null === (p = window.settings) || void 0 === p || null === (h = p.theme) || void 0 === h ? void 0 : h.header) && void 0 !== f ? f : "dark",
                A = null !== (O = null === (g = window.settings) || void 0 === g || null === (v = g.theme) || void 0 === v ? void 0 : v.color) && void 0 !== O ? O : "default",
                U = null !== (x = null === (w = window.settings) || void 0 === w ? void 0 : w.host) && void 0 !== x ? x : "",
                L = "application/json",
                V = !1,
                G = !0,
                Y = new Intl.NumberFormat("vi-VN", { style: "currency", currency: "VND", maximumFractionDigits: Number(0).valueOf() })
        },
        ZW6p: function(e, t, n) {
            "use strict";
            n.d(t, "d", (function() { return b })), n.d(t, "a", (function() { return m })), n.d(t, "c", (function() { return j })), n.d(t, "b", (function() { return p }));
            var a = n("tJVT"),
                r = n("q1tI"),
                c = n.n(r),
                s = n("+qE3"),
                i = n.n(s),
                o = n("wd/R"),
                l = n.n(o),
                d = (n("KSF8"), n("XDpg"), n("Fghh")),
                u = n("nKUr"),
                b = new i.a;
            b.setMaxListeners(5);
            var m = Symbol("LANG_CHANGE");

            function j() {
                var e, t = Object(d["c"])();
                null !== l.a && void 0 !== l.a && l.a.locale && l.a.locale((null === (e = d["d"][t]) || void 0 === e ? void 0 : e.momentLocale) || "");
                Object(d["e"])(t)
            }
            var f = "undefined" !== typeof window && "undefined" !== typeof window.document && "undefined" !== typeof window.document.createElement ? c.a.useLayoutEffect : c.a.useEffect,
                p = function(e) {
                    var t = c.a.useState((function() { return Object(d["c"])() })),
                        n = Object(a["a"])(t, 2),
                        r = n[0],
                        s = n[1],
                        i = c.a.useState((function() { return Object(d["b"])(r, !0) })),
                        o = Object(a["a"])(i, 2),
                        j = o[0],
                        p = o[1],
                        h = function(e) {
                            var t;
                            null !== l.a && void 0 !== l.a && l.a.locale && l.a.locale((null === (t = d["d"][e]) || void 0 === t ? void 0 : t.momentLocale) || "en");
                            s(e), p(Object(d["b"])(e))
                        };
                    return f((function() {
                        return b.on(m, h),
                            function() { b.off(m, h) }
                    }), []), Object(u["jsx"])(d["a"], { value: j, children: e.children })
                }
        },
        "a+qF": function(e, t, n) {
            "use strict";
            n.r(t);
            var a = n("k1fw"),
                r = n("9og8"),
                c = n("tJVT"),
                s = n("WmNS"),
                i = n.n(s),
                o = n("q1tI"),
                l = n("9kvl"),
                d = n("CLrh"),
                u = (n("+L6B"), n("2/Rp")),
                b = (n("DYRE"), n("zeV3")),
                m = (n("5Dmo"), n("3S7+")),
                j = (n("2qtc"), n("kLXV")),
                f = (n("5NDa"), n("5rEg")),
                p = n("/YUT"),
                h = n.n(p),
                O = n("X8fG"),
                g = n("nKUr"),
                v = function(e) {
                    var t = e.minRechargeAmount,
                        n = e.maxRechargeAmount,
                        a = e.visible,
                        s = e.onRechargeSuccess,
                        u = e.onCancel,
                        b = Object(o["useRef"])(null),
                        m = Object(o["useState"])(!1),
                        p = Object(c["a"])(m, 2),
                        v = p[0],
                        x = p[1],
                        w = Object(l["g"])(),
                        k = function() {
                            var e = Object(r["a"])(i.a.mark((function e() {
                                var t, n, a, r;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return a = 100 * Number(null === (t = b.current) || void 0 === t || null === (n = t.input) || void 0 === n ? void 0 : n.value).valueOf(), x(!0), e.next = 4, Object(d["y"])({ recharge_amount: a });
                                        case 4:
                                            r = e.sent, h()(1e3).then((function() { x(!1) })), void 0 !== r && s(r.data);
                                        case 7:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return Object(g["jsx"])(g["Fragment"], { children: Object(g["jsxs"])(j["a"], { title: w.formatMessage({ id: "modal.wallet.recharge.title" }), visible: a, onOk: k, onCancel: u, confirmLoading: v, destroyOnClose: !0, children: [Object(g["jsxs"])("div", { className: "alert alert-primary d-flex align-items-center", role: "alert", children: [Object(g["jsx"])("div", { className: "flex-00-auto", children: Object(g["jsx"])("i", { className: "fa fa-fw fa-info-circle" }) }), Object(g["jsx"])("div", { className: "flex-fill ml-3", children: Object(g["jsx"])("p", { className: "mb-0", children: w.formatMessage({ id: "modal.wallet.recharge.tip" }, { minRechargeAmount: O["f"].format(t), maxRechargeAmount: O["f"].format(n) }) }) })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: w.formatMessage({ id: "modal.wallet.recharge.amount" }) }), Object(g["jsx"])(f["a"], { type: "number", className: "form-control", placeholder: w.formatMessage({ id: "modal.wallet.recharge.enter_amount" }), ref: b })] })] }) })
                },
                x = v,
                w = (n("miYZ"), n("tsqr")),
                k = (n("Znn+"), n("ZTPi")),
                _ = k["a"].TabPane,
                y = function(e) {
                    var t = e.visible,
                        n = e.onTransferSuccess,
                        a = e.onCancel,
                        s = e.commissionBalance,
                        u = e.balance,
                        b = e.transferBalanceClose,
                        m = Object(o["useRef"])(null),
                        p = Object(o["useRef"])(null),
                        O = Object(o["useRef"])(null),
                        v = Object(o["useState"])(!1),
                        x = Object(c["a"])(v, 2),
                        y = x[0],
                        N = x[1],
                        S = Object(o["useState"])("commission_balance"),
                        M = Object(c["a"])(S, 2),
                        C = M[0],
                        T = M[1],
                        I = Object(l["g"])(),
                        D = function() {
                            var e = Object(r["a"])(i.a.mark((function e() {
                                var t, a, r, c;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return r = 100 * Number(null === (t = m.current) || void 0 === t || null === (a = t.input) || void 0 === a ? void 0 : a.value).valueOf(), N(!0), e.next = 4, Object(d["P"])({ transfer_amount: r });
                                        case 4:
                                            c = e.sent, h()(1e3).then((function() { N(!1) })), void 0 !== c && (w["default"].success(I.formatMessage({ id: "modal.wallet.transfer.message.success" })), n());
                                        case 7:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }(),
                        E = function() {
                            var e = Object(r["a"])(i.a.mark((function e() {
                                var t, a, r, c, s, o, l;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return s = 100 * Number(null === (t = p.current) || void 0 === t || null === (a = t.input) || void 0 === a ? void 0 : a.value).valueOf(), o = null === (r = O.current) || void 0 === r || null === (c = r.input) || void 0 === c ? void 0 : c.value, N(!0), e.next = 5, Object(d["O"])({ transfer_amount: s, transfer_user_email: o });
                                        case 5:
                                            l = e.sent, h()(1e3).then((function() { N(!1) })), void 0 !== l && (w["default"].success(I.formatMessage({ id: "modal.wallet.transfer.message.success" })), n());
                                        case 8:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return Object(g["jsx"])(g["Fragment"], { children: Object(g["jsx"])(j["a"], { title: I.formatMessage({ id: "modal.wallet.transfer.title" }), visible: t, onOk: "commission_balance" === C ? D : E, onCancel: a, confirmLoading: y, destroyOnClose: !0, children: Object(g["jsxs"])(k["a"], { type: "card", size: "small", defaultActiveKey: "1", onTabClick: function(e) { T(e) }, children: [Object(g["jsxs"])(_, { tab: I.formatMessage({ id: "modal.wallet.transfer.tab.commission_balance" }), children: [Object(g["jsxs"])("div", { className: "alert alert-danger d-flex align-items-center", role: "alert", children: [Object(g["jsx"])("div", { className: "flex-00-auto", children: Object(g["jsx"])("i", { className: "fa fa-fw fa-info-circle" }) }), Object(g["jsx"])("div", { className: "flex-fill ml-3", children: Object(g["jsx"])("p", { className: "mb-0", children: I.formatMessage({ id: "modal.wallet.transfer_commission_balance.tip" }) }) })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: I.formatMessage({ id: "modal.wallet.transfer_commission_balance.current_total" }) }), Object(g["jsx"])(f["a"], { disabled: !0, className: "form-control", value: Math.floor(s) / 100 })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: I.formatMessage({ id: "modal.wallet.transfer_commission_balance.amount" }) }), Object(g["jsx"])(f["a"], { className: "form-control", placeholder: I.formatMessage({ id: "modal.wallet.transfer_commission_balance.enter_amount" }), ref: m })] })] }, "commission_balance"), !1 === b && Object(g["jsxs"])(_, { tab: I.formatMessage({ id: "modal.wallet.transfer.tab.balance" }), children: [Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: I.formatMessage({ id: "modal.wallet.transfer_balance.current_total" }) }), Object(g["jsx"])(f["a"], { disabled: !0, className: "form-control", value: Math.floor(u) / 100 })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: I.formatMessage({ id: "modal.wallet.transfer_balance.user_email" }) }), Object(g["jsx"])(f["a"], { className: "form-control", ref: O, placeholder: I.formatMessage({ id: "modal.wallet.transfer_balance.enter_user_email" }) })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: I.formatMessage({ id: "modal.wallet.transfer_balance.amount" }) }), Object(g["jsx"])(f["a"], { className: "form-control", type: "number", ref: p, placeholder: I.formatMessage({ id: "modal.wallet.transfer_balance.enter_amount" }) })] })] }, "balance")] }) }) })
                },
                N = y,
                S = (n("OaEy"), n("2fM7")),
                M = S["a"].Option,
                C = function(e) {
                    var t = e.onWithdrawlSuccess,
                        n = e.visiable,
                        a = e.onCancel,
                        s = e.withdrawMethods,
                        u = Object(o["useState"])(""),
                        b = Object(c["a"])(u, 2),
                        m = b[0],
                        p = b[1],
                        O = Object(o["useState"])(!1),
                        v = Object(c["a"])(O, 2),
                        x = v[0],
                        w = v[1],
                        k = Object(o["useRef"])(null),
                        _ = Object(l["g"])(),
                        y = function(e) { p(e) },
                        N = function() {
                            var e = Object(r["a"])(i.a.mark((function e() {
                                var n, a, r, c;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return w(!0), r = null === (n = k.current) || void 0 === n || null === (a = n.input) || void 0 === a ? void 0 : a.value, e.next = 4, Object(d["K"])({ withdraw_account: r, withdraw_method: m });
                                        case 4:
                                            if (c = e.sent, h()(1e3).then((function() { w(!1) })), void 0 !== c) { e.next = 8; break }
                                            return e.abrupt("return");
                                        case 8:
                                            t();
                                        case 9:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return Object(g["jsx"])(g["Fragment"], { children: Object(g["jsxs"])(j["a"], { title: _.formatMessage({ id: "modal.wallet.wallet.withdrawal.title" }), visible: n, onOk: N, onCancel: a, confirmLoading: x, destroyOnClose: !0, children: [Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: _.formatMessage({ id: "modal.wallet.wallet.withdrawal.method" }) }), Object(g["jsx"])("div", { children: Object(g["jsx"])(S["a"], { style: { width: "100%" }, placeholder: _.formatMessage({ id: "modal.wallet.wallet.withdrawal.enter_method" }), onChange: y, children: s.map((function(e) { return Object(g["jsx"])(M, { value: e, children: e }, e) })) }) })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: _.formatMessage({ id: "modal.wallet.wallet.withdrawal.account" }) }), Object(g["jsx"])(f["a"], { ref: k, type: "text", className: "ant-input form-control", placeholder: _.formatMessage({ id: "modal.wallet.wallet.withdrawal.enter_account" }) })] })] }) })
                },
                T = C,
                I = n("Lyp1"),
                D = n("HjwJ"),
                E = n("Ukkf"),
                R = n("f1wO"),
                F = function(e) {
                    var t = e.balance,
                        n = e.commissionBalance,
                        a = e.rechargeClose,
                        r = e.withdrawClose,
                        s = e.transferBalanceClose,
                        i = e.withdrawMethods,
                        d = e.minRechargeAmount,
                        j = e.maxRechargeAmount,
                        f = e.onChange,
                        p = Object(o["useState"])(!1),
                        h = Object(c["a"])(p, 2),
                        v = h[0],
                        w = h[1],
                        k = Object(o["useState"])(!1),
                        _ = Object(c["a"])(k, 2),
                        y = _[0],
                        S = _[1],
                        M = Object(o["useState"])(!1),
                        C = Object(c["a"])(M, 2),
                        F = C[0],
                        P = C[1],
                        q = Object(l["g"])(),
                        A = function() { S(!0) },
                        U = function() { S(!1) },
                        L = function(e) { w(!1), l["c"].push("/order/".concat(e)) },
                        V = function() { S(!1), f && f() },
                        G = function() { w(!0) },
                        Y = function() { w(!1) },
                        B = function() { P(!0) },
                        z = function() { P(!1) },
                        H = function() { P(!1), l["c"].push("/ticket") };
                    return Object(g["jsxs"])(g["Fragment"], { children: [Object(g["jsx"])("div", { className: "row", children: Object(g["jsx"])("div", { className: "col-lg-12", children: Object(g["jsx"])("div", { className: "block block-bordered", children: Object(g["jsxs"])("div", { className: "block-content pb-3", children: [Object(g["jsx"])("i", { className: "fa fa-wallet fa-2x text-gray-light float-right" }), Object(g["jsxs"])("div", { className: "pb-sm-3", children: [Object(g["jsx"])("p", { className: "text-muted w-75", children: q.formatMessage({ id: "profile.wallet.title" }) }), Object(g["jsx"])("p", { className: "display-4 text-black font-w300 mb-2", children: O["f"].format((t + n) / 100) }), Object(g["jsx"])("span", { className: "text-muted", style: { cursor: "pointer" }, children: Object(g["jsxs"])(b["b"], { children: [q.formatMessage({ id: "profile.wallet.tip" }), Object(g["jsx"])(m["a"], { placement: "right", title: Object(g["jsxs"])("div", { children: [Object(g["jsxs"])("div", { children: [q.formatMessage({ id: "profile.wallet.tip.balance" }), "\uff1a", O["f"].format(t / 100)] }), Object(g["jsxs"])("div", { children: [q.formatMessage({ id: "profile.wallet.tip.commission_balance" }), "\uff1a", O["f"].format(n / 100)] })] }), children: Object(g["jsx"])(I["a"], {}) })] }) }), Object(g["jsxs"])("div", { className: "pt-3", children: [!1 === a && Object(g["jsxs"])(u["a"], { type: "primary", className: "mr-2", onClick: function(e) { e.preventDefault(), G() }, children: [Object(g["jsx"])(D["a"], {}), Object(g["jsxs"])("span", { children: [" ", q.formatMessage({ id: "profile.wallet.recharge_btn" })] })] }), Object(g["jsxs"])(u["a"], { className: "mr-2", onClick: function(e) { e.preventDefault(), A() }, children: [Object(g["jsx"])(E["a"], {}), Object(g["jsxs"])("span", { children: [" ", q.formatMessage({ id: "profile.wallet.transfer_btn" })] })] }), !1 === r && Object(g["jsxs"])(u["a"], { type: "default", onClick: function(e) { e.preventDefault(), B() }, children: [Object(g["jsx"])(R["a"], {}), Object(g["jsxs"])("span", { children: [" ", q.formatMessage({ id: "profile.wallet.withdrawal_btn" })] })] })] })] })] }) }) }) }), Object(g["jsx"])(x, { minRechargeAmount: d, maxRechargeAmount: j, onCancel: Y, visible: v, onRechargeSuccess: L }), Object(g["jsx"])(N, { commissionBalance: n, balance: t, transferBalanceClose: s, onCancel: U, visible: y, onTransferSuccess: V }), !1 === r && Object(g["jsx"])(T, { visiable: F, onCancel: z, onWithdrawlSuccess: H, withdrawMethods: i })] })
                },
                P = F,
                q = function(e) {
                    var t = e.onChange,
                        n = Object(o["useRef"])(null),
                        a = Object(o["useRef"])(null),
                        s = Object(o["useRef"])(null),
                        b = Object(o["useState"])(!1),
                        m = Object(c["a"])(b, 2),
                        j = m[0],
                        f = m[1],
                        p = Object(l["g"])(),
                        O = function() {
                            var e = Object(r["a"])(i.a.mark((function e() {
                                var r, c, o, l, u, b, m;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            if (l = null === (r = n.current) || void 0 === r ? void 0 : r.value, u = null === (c = a.current) || void 0 === c ? void 0 : c.value, b = null === (o = s.current) || void 0 === o ? void 0 : o.value, "" === u || u === b) { e.next = 6; break }
                                            return w["default"].error(p.formatMessage({ id: "profile.password.message.password_diffrent" })), e.abrupt("return");
                                        case 6:
                                            return e.next = 8, Object(d["a"])({ old_password: l, new_password: u });
                                        case 8:
                                            if (m = e.sent, void 0 !== m) { e.next = 11; break }
                                            return e.abrupt("return");
                                        case 11:
                                            w["default"].success(p.formatMessage({ id: "profile.password.message.change_success" })), null === t || void 0 === t || t();
                                        case 13:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function() { return e.apply(this, arguments) }
                        }();
                    return Object(g["jsx"])(g["Fragment"], {
                        children: Object(g["jsxs"])("div", {
                            className: "block block-rounded block-bordered",
                            children: [Object(g["jsxs"])("div", {
                                className: "block-header block-header-default",
                                children: [Object(g["jsx"])("h3", { className: "block-title", children: p.formatMessage({ id: "profile.password.title" }) }), Object(g["jsx"])("div", {
                                    className: "block-options",
                                    children: Object(g["jsx"])(u["a"], {
                                        type: "primary",
                                        loading: j,
                                        shape: "round",
                                        onClick: function() {
                                            var e = Object(r["a"])(i.a.mark((function e(t) {
                                                return i.a.wrap((function(e) {
                                                    while (1) switch (e.prev = e.next) {
                                                        case 0:
                                                            return f(!0), t.preventDefault(), e.next = 4, O();
                                                        case 4:
                                                            h()(1e3).then((function() { f(!1) }));
                                                        case 5:
                                                        case "end":
                                                            return e.stop()
                                                    }
                                                }), e)
                                            })));
                                            return function(t) { return e.apply(this, arguments) }
                                        }(),
                                        children: p.formatMessage({ id: "profile.password.save_btn" })
                                    })
                                })]
                            }), Object(g["jsx"])("div", { className: "block-content", children: Object(g["jsx"])("div", { className: "row push", children: Object(g["jsxs"])("div", { className: "col-lg-8 col-xl-5", children: [Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: p.formatMessage({ id: "profile.password.old_password" }) }), Object(g["jsx"])("input", { ref: n, type: "password", className: "form-control", placeholder: p.formatMessage({ id: "profile.password.enter_old_password" }) })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: p.formatMessage({ id: "profile.password.new_password" }) }), Object(g["jsx"])("input", { ref: a, type: "password", className: "form-control", placeholder: p.formatMessage({ id: "profile.password.enter_new_password" }) })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: p.formatMessage({ id: "profile.password.new_password" }) }), Object(g["jsx"])("input", { ref: s, type: "password", className: "form-control", placeholder: p.formatMessage({ id: "profile.password.enter_repeat_password" }) })] })] }) }) })]
                        })
                    })
                },
                A = q,
                U = (n("BoS7"), n("Sdc0")),
                L = function(e) {
                    var t = e.remindExpire,
                        n = e.remindTraffic,
                        a = e.onChange,
                        s = Object(o["useState"])(!1),
                        u = Object(c["a"])(s, 2),
                        b = u[0],
                        m = u[1],
                        j = Object(o["useState"])(!1),
                        f = Object(c["a"])(j, 2),
                        p = f[0],
                        h = f[1],
                        O = Object(l["g"])(),
                        v = function() {
                            var e = Object(r["a"])(i.a.mark((function e(t) {
                                var n;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return m(!0), e.next = 3, Object(d["Q"])({ remind_expire: Number(t).valueOf() });
                                        case 3:
                                            n = e.sent, void 0 !== n && a(), m(!1);
                                        case 6:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function(t) { return e.apply(this, arguments) }
                        }(),
                        x = function() {
                            var e = Object(r["a"])(i.a.mark((function e(t) {
                                var n;
                                return i.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return h(!0), e.next = 3, Object(d["Q"])({ remind_traffic: Number(t).valueOf() });
                                        case 3:
                                            n = e.sent, void 0 !== n && a(), h(!1);
                                        case 6:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function(t) { return e.apply(this, arguments) }
                        }();
                    return Object(g["jsx"])(g["Fragment"], { children: Object(g["jsxs"])("div", { className: "block block-rounded block-bordered", children: [Object(g["jsx"])("div", { className: "block-header block-header-default", children: Object(g["jsx"])("h3", { className: "block-title", children: O.formatMessage({ id: "profile.setting.notice" }) }) }), Object(g["jsx"])("div", { className: "block-content", children: Object(g["jsx"])("div", { className: "row push", children: Object(g["jsxs"])("div", { className: "col-lg-8 col-xl-5", children: [Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: O.formatMessage({ id: "profile.setting.remind_expire" }) }), Object(g["jsx"])("div", { children: Object(g["jsx"])(U["a"], { defaultChecked: t, onChange: v, loading: b }) })] }), Object(g["jsxs"])("div", { className: "form-group", children: [Object(g["jsx"])("label", { children: O.formatMessage({ id: "profile.setting.remind_traffic" }) }), Object(g["jsx"])("div", { children: Object(g["jsx"])(U["a"], { defaultChecked: n, onChange: x, loading: p }) })] })] }) }) })] }) })
                },
                V = L,
                G = n("axB/"),
                Y = function(e) {
                    var t = e.subscribeUrl,
                        n = e.discussLink,
                        a = Object(o["useState"])(!1),
                        r = Object(c["a"])(a, 2),
                        s = r[0],
                        i = r[1],
                        d = Object(l["g"])(),
                        u = function() { i(!0) },
                        b = function() { i(!1) };
                    return Object(g["jsxs"])(g["Fragment"], { children: [n && Object(g["jsx"])("div", { className: "block block-rounded", children: Object(g["jsxs"])("div", { className: "block-header block-header-default", children: [Object(g["jsxs"])("h3", { className: "block-title", children: [" ", d.formatMessage({ id: "profile.telegram.discuss_group" })] }), Object(g["jsx"])("div", { className: "block-options", children: Object(g["jsx"])("a", { href: n, target: "_blank", rel: "noopener noreferrer", className: "btn btn-primary btn-sm btn-rounded px-3", children: d.formatMessage({ id: "profile.telegram.join_now" }) }) })] }) }), Object(g["jsx"])("div", { className: "block block-rounded block-bordered", children: Object(g["jsxs"])("div", { className: "block-header block-header-default", children: [Object(g["jsx"])("h3", { className: "block-title", children: d.formatMessage({ id: "profile.telegram.bind" }, { name: "Telegram" }) }), Object(g["jsx"])("div", { className: "block-options", children: Object(g["jsx"])("button", { type: "button", className: "btn btn-primary btn-sm  btn-rounded px-3", onClick: function(e) { e.preventDefault(), u() }, children: d.formatMessage({ id: "profile.telegram.start_btn" }) }) })] }) }), Object(g["jsx"])(G["a"], { visiable: s, onCancel: b, subscribeUrl: t })] })
                },
                B = Y,
                z = function(e) {
                    var t = e.onChange,
                        n = Object(l["h"])("useSubModel"),
                        a = n.refresh,
                        c = Object(l["g"])(),
                        s = function() {
                            j["a"].confirm({
                                title: c.formatMessage({ id: "profile.reset.reset_private.title" }),
                                content: c.formatMessage({ id: "profile.reset.reset_private.content" }),
                                onOk: function() {
                                    var e = Object(r["a"])(i.a.mark((function e() {
                                        var n;
                                        return i.a.wrap((function(e) {
                                            while (1) switch (e.prev = e.next) {
                                                case 0:
                                                    return e.next = 2, Object(d["A"])();
                                                case 2:
                                                    if (n = e.sent, void 0 !== n) { e.next = 5; break }
                                                    return e.abrupt("return");
                                                case 5:
                                                    return e.next = 7, a();
                                                case 7:
                                                    null === t || void 0 === t || t(), w["default"].success(c.formatMessage({ id: "common.message.request_success" }));
                                                case 9:
                                                case "end":
                                                    return e.stop()
                                            }
                                        }), e)
                                    })));

                                    function n() { return e.apply(this, arguments) }
                                    return n
                                }()
                            })
                        };
                    return Object(g["jsx"])(g["Fragment"], { children: Object(g["jsx"])("div", { className: "block block-rounded block-bordered", children: Object(g["jsxs"])("div", { className: "block-header block-header-default", children: [Object(g["jsx"])("h3", { className: "block-title", children: c.formatMessage({ id: "profile.reset.reset_private" }) }), Object(g["jsx"])("div", { className: "block-options", children: Object(g["jsx"])("button", { type: "button", className: "btn btn-danger btn-sm btn-primary btn-rounded px-3", onClick: function(e) { e.preventDefault(), s() }, children: c.formatMessage({ id: "profile.reset.reset_btn" }) }) })] }) }) })
                },
                H = z,
                K = n("ET/R"),
                W = function() {
                    var e, t = Object(l["h"])("@@initialState"),
                        n = t.initialState,
                        s = t.setInitialState,
                        u = Object(l["h"])("useSubModel"),
                        b = u.subState,
                        m = u.initSubState,
                        j = Object(o["useState"])(),
                        f = Object(c["a"])(j, 2),
                        p = f[0],
                        O = f[1];
                    Object(K["a"])(Object(r["a"])(i.a.mark((function e() {
                        return i.a.wrap((function(e) {
                            while (1) switch (e.prev = e.next) {
                                case 0:
                                    return e.next = 2, m();
                                case 2:
                                case "end":
                                    return e.stop()
                            }
                        }), e)
                    })))), Object(o["useEffect"])((function() {
                        Object(r["a"])(i.a.mark((function e() {
                            var t;
                            return i.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(d["x"])();
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        O(t.data);
                                    case 6:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []);
                    var v = Object(o["useState"])(null === n || void 0 === n || null === (e = n.currentUser) || void 0 === e ? void 0 : e.data),
                        x = Object(c["a"])(v, 2),
                        w = x[0],
                        k = x[1],
                        _ = function() {
                            var e, t = null === n || void 0 === n || null === (e = n.fetchUserInfo) || void 0 === e ? void 0 : e.call(n);
                            void 0 !== t && t.then((function(e) { s(Object(a["a"])(Object(a["a"])({}, n), {}, { currentUser: e })), k(e.data) }))
                        },
                        y = function() { h()(1e3).then((function() { l["c"].push("/login") })) };
                    return Object(g["jsx"])(g["Fragment"], { children: w && p && Object(g["jsxs"])("div", { className: "content content-full", children: [Object(g["jsx"])(P, { onChange: _, minRechargeAmount: p.min_recharge_amount, maxRechargeAmount: p.max_recharge_amount, rechargeClose: Boolean(p.recharge_close).valueOf(), withdrawClose: Boolean(p.withdraw_close).valueOf(), transferBalanceClose: Boolean(p.transfer_balance_close).valueOf(), withdrawMethods: p.withdraw_methods, balance: w.balance, commissionBalance: w.commission_balance }), Object(g["jsx"])(A, { onChange: y }), Object(g["jsx"])(V, { remindExpire: Boolean(w.remind_expire).valueOf(), remindTraffic: Boolean(w.remind_traffic).valueOf(), onChange: _ }), 1 === p.is_telegram && Object(g["jsx"])(B, { subscribeUrl: b.subscribeUrl, discussLink: p.telegram_discuss_link }), Object(g["jsx"])(H, {})] }) })
                };
            t["default"] = W
        },
        aCde: function(e, t, n) {},
        "axB/": function(e, t, n) {
            "use strict";
            n("2qtc");
            var a = n("kLXV"),
                r = (n("DYRE"), n("zeV3")),
                c = (n("+L6B"), n("2/Rp")),
                s = n("9og8"),
                i = n("tJVT"),
                o = n("WmNS"),
                l = n.n(o),
                d = n("q1tI"),
                u = n("ye1Q"),
                b = n("CLrh"),
                m = n("9kvl"),
                j = n("nKUr"),
                f = function(e) {
                    var t = e.visiable,
                        n = e.subscribeUrl,
                        o = e.onCancel,
                        f = Object(d["useState"])(""),
                        p = Object(i["a"])(f, 2),
                        h = p[0],
                        O = p[1],
                        g = Object(m["g"])();
                    Object(d["useEffect"])((function() {
                        !1 !== t && "" === h && Object(s["a"])(l.a.mark((function e() {
                            var t;
                            return l.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(b["F"])();
                                    case 2:
                                        t = e.sent, O(t.data.username);
                                    case 4:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), [t]);
                    var v = function() { return Object(j["jsx"])(c["a"], { type: "default", onClick: function(e) { e.preventDefault(), o() }, children: Object(j["jsx"])("span", { children: g.formatMessage({ id: "modal.telegram.got_it" }) }) }) },
                        x = function() { return Object(j["jsxs"])(j["Fragment"], { children: [Object(j["jsxs"])("h2", { className: "content-heading pt-1", children: [Object(j["jsx"])("i", { className: "fa fa-arrow-right text-info mr-1" }), g.formatMessage({ id: "modal.telegram.first_step" })] }), Object(j["jsx"])("div", { children: Object(j["jsxs"])(r["b"], { children: [g.formatMessage({ id: "modal.telegram.search" }, { name: "telegram" }), Object(j["jsx"])("a", { href: "https://t.me/".concat(h), children: h })] }) }), Object(j["jsxs"])("h2", { className: "content-heading", children: [Object(j["jsx"])("i", { className: "fa fa-arrow-right text-info mr-1" }), g.formatMessage({ id: "modal.telegram.second_step" })] }), Object(j["jsxs"])("div", { children: [g.formatMessage({ id: "modal.telegram.send_bot" }), Object(j["jsx"])("br", {}), Object(j["jsxs"])("code", { children: ["/bind ", n] })] })] }) };
                    return Object(j["jsx"])(j["Fragment"], { children: Object(j["jsx"])(a["a"], { title: g.formatMessage({ id: "modal.telegram.bind" }, { name: "Telegram" }), visible: t, onCancel: o, footer: v(), children: h ? x() : Object(j["jsx"])(u["a"], {}) }) })
                };
            t["a"] = f
        },
        bCY9: function(e, t, n) {
            "use strict";
            n.d(t, "a", (function() { return r }));
            var a = n("rlch"),
                r = new a["b"]({ validKeys: ["modifyClientRenderOpts", "patchRoutes", "rootContainer", "render", "onRouteChange", "__mfsu", "getInitialState", "initialStateConfig", "locale", "request"] })
        },
        gaw8: function(e, t, n) {
            "use strict";
            n.r(t);
            n("T2oS");
            var a = n("W9HT"),
                r = (n("Awhp"), n("KrTs")),
                c = (n("+BJd"), n("mr32")),
                s = (n("DYRE"), n("zeV3")),
                i = n("9og8"),
                o = n("tJVT"),
                l = n("WmNS"),
                d = n.n(l),
                u = n("q1tI"),
                b = n.n(u),
                m = n("9kvl"),
                j = n("55Ip"),
                f = (n("5Dmo"), n("3S7+")),
                p = (n("g9YV"), n("wCAj")),
                h = n("Lyp1"),
                O = n("nKUr"),
                g = p["a"].Column,
                v = function(e) {
                    var t = e.dataSource,
                        n = Object(m["g"])();
                    return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsxs"])("div", { className: "block block-rounded js-appear-enabled", children: [Object(O["jsx"])("div", { className: "block-header block-header-default", children: Object(O["jsx"])("h3", { className: "block-title", children: n.formatMessage({ id: "subscribe.list.title" }) }) }), Object(O["jsx"])("div", { className: "block-content p-0", children: Object(O["jsxs"])(p["a"], { rowKey: function(e) { return "".concat(e.key) }, pagination: !1, dataSource: t, scroll: { x: !0 }, bordered: !1, loading: !1, children: [Object(O["jsx"])(g, { title: n.formatMessage({ id: "subscribe.list.column.name" }), dataIndex: "name" }, "name"), Object(O["jsx"])(g, { title: Object(O["jsx"])(O["Fragment"], { children: Object(O["jsxs"])(s["b"], { children: [n.formatMessage({ id: "subscribe.list.column.status" }), Object(O["jsx"])(f["a"], { title: n.formatMessage({ id: "subscribe.list.column.status.tip" }), children: Object(O["jsx"])(h["a"], {}) })] }) }), dataIndex: "status" }, "status"), Object(O["jsx"])(g, { title: Object(O["jsx"])(O["Fragment"], { children: Object(O["jsxs"])(s["b"], { children: [n.formatMessage({ id: "subscribe.list.column.rate" }), Object(O["jsx"])(f["a"], { title: n.formatMessage({ id: "subscribe.list.column.rate.tip" }), children: Object(O["jsx"])(h["a"], {}) })] }) }), dataIndex: "rate", responsive: ["lg", "md"] }, "rate"), Object(O["jsx"])(g, { title: n.formatMessage({ id: "subscribe.list.column.tags" }), dataIndex: "tags", responsive: ["lg", "md"] }, "tags")] }) })] }) })
                },
                x = v,
                w = n("CLrh"),
                k = n("k1fw"),
                _ = n("+Jtn"),
                y = n("vjGn"),
                N = (n("qVdP"), n("jsC+")),
                S = (n("lUTK"), n("BvKs")),
                M = (n("miYZ"), n("tsqr")),
                C = (n("2qtc"), n("kLXV")),
                T = function(e) {
                    var t = e.planID,
                        n = e.onResetPrivate,
                        a = Object(m["g"])(),
                        r = Object(m["h"])("useSubModel"),
                        c = r.subState,
                        s = Object(u["useState"])(!1),
                        l = Object(o["a"])(s, 2),
                        b = l[0],
                        f = l[1],
                        p = Object(u["useState"])(!1),
                        h = Object(o["a"])(p, 2),
                        g = h[0],
                        v = h[1],
                        x = function() { C["a"].confirm({ title: a.formatMessage({ id: "subscribe.top.operation.reset_traffic.title" }), content: a.formatMessage({ id: "subscribe.top.operation.reset_traffic.content" }), onOk: function() { m["c"].push({ pathname: "/plan/".concat(t), state: { defaultCheckedIndex: -1 } }) }, onCancel: function() { v(!1) } }) },
                        k = function() {
                            C["a"].confirm({
                                title: a.formatMessage({ id: "subscribe.top.operation.reset_private.title" }),
                                content: a.formatMessage({ id: "subscribe.top.operation.reset_private.content" }),
                                onOk: function() {
                                    var e = Object(i["a"])(d.a.mark((function e() {
                                        var t, r;
                                        return d.a.wrap((function(e) {
                                            while (1) switch (e.prev = e.next) {
                                                case 0:
                                                    if (!n) { e.next = 9; break }
                                                    return e.next = 3, Object(w["A"])();
                                                case 3:
                                                    if (t = e.sent, void 0 !== t) { e.next = 6; break }
                                                    return e.abrupt("return");
                                                case 6:
                                                    r = t.data, n(r), M["default"].success(a.formatMessage({ id: "subscribe.top.operation.reset_private.messages.success" }));
                                                case 9:
                                                    f(!1);
                                                case 10:
                                                case "end":
                                                    return e.stop()
                                            }
                                        }), e)
                                    })));

                                    function t() { return e.apply(this, arguments) }
                                    return t
                                }(),
                                onCancel: function() { f(!1) }
                            })
                        },
                        _ = function() { return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsxs"])(S["a"], { selectable: !1, children: [Object(O["jsx"])(S["a"].Item, { children: c.isAvailable ? Object(O["jsxs"])(j["a"], { to: "/plan/".concat(t), children: [Object(O["jsx"])("i", { className: "fa fa-clock mr-1" }), a.formatMessage({ id: "subscribe.renew" })] }) : Object(O["jsxs"])(j["a"], { to: "/plan", children: [Object(O["jsx"])("i", { className: "fa fa-shopping-cart mr-1" }), a.formatMessage({ id: "subscribe.purchase" })] }) }, "0"), c.isAvailable && Object(O["jsx"])(S["a"].Item, { children: Object(O["jsxs"])(j["a"], { to: "", onClick: function(e) { e.preventDefault(), x(), v(!0) }, disabled: g, children: [Object(O["jsx"])("i", { className: "fa fa-sync-alt mr-1" }), a.formatMessage({ id: "subscribe.top.operation.reset_traffic" })] }) }, "1"), Object(O["jsx"])(S["a"].Item, { children: Object(O["jsxs"])(j["a"], { to: "", onClick: function(e) { e.preventDefault(), k(), f(!0) }, disabled: b, children: [Object(O["jsx"])("i", { className: "fa fa-user-shield mr-1" }), a.formatMessage({ id: "subscribe.top.operation.reset_private" })] }) }, "2")] }) }) };
                    return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsx"])(N["a"], { overlay: _, placement: "bottomLeft", trigger: ["click"], children: Object(O["jsxs"])(j["a"], { className: "btn btn-sm btn-outline-primary btn-rounded px-3 mr-1 my-1 ant-dropdown-trigger", to: "", onClick: function(e) { return e.preventDefault() }, children: [Object(O["jsx"])("i", { className: "fa fa-cog mr-1" }), a.formatMessage({ id: "common.column.operation" })] }) }) })
                },
                I = T,
                D = n("ET/R"),
                E = function() {
                    var e = Object(m["h"])("useSubModel"),
                        t = e.subState,
                        n = e.setSubState,
                        a = e.initSubState,
                        r = e.generateUrls,
                        c = t,
                        s = t,
                        o = Object(m["g"])(),
                        l = function(e) {
                            var a = e;
                            n(Object(k["a"])(Object(k["a"])({}, t), {}, { subscribeUrl: a }, r(a)))
                        },
                        u = function() { return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsx"])("div", { className: "block block-rounded mb-4", children: Object(O["jsx"])("div", { className: "block-content block-content-full", children: Object(O["jsxs"])("div", { className: "d-md-flex justify-content-md-between align-items-md-center", children: [Object(O["jsx"])(_["a"], Object(k["a"])({}, c)), Object(O["jsxs"])("div", { className: "p-1 p-md-3 col-md-6 col-xs-12 text-md-right", children: [Object(O["jsx"])(y["a"], Object(k["a"])({}, s)), t.planID > 0 && Object(O["jsx"])(I, { planID: t.planID, onResetPrivate: l })] })] }) }) }) }) },
                        b = function() { return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsx"])(j["a"], { className: "block block-rounded mb-4 block-link-pop", to: "/plan", children: Object(O["jsx"])("div", { className: "block-content block-content-full", children: Object(O["jsxs"])("div", { className: "text-center align-items-md-center py-5", children: [Object(O["jsx"])("div", { children: Object(O["jsx"])("i", { className: "fa fa-plus fa-2x" }) }), Object(O["jsx"])("div", { className: "font-size-sm font-w700 text-uppercase text-muted pt-2", children: o.formatMessage({ id: "module.plan" }) })] }) }) }) }) };
                    return Object(D["a"])(Object(i["a"])(d.a.mark((function e() {
                        return d.a.wrap((function(e) {
                            while (1) switch (e.prev = e.next) {
                                case 0:
                                    a();
                                case 1:
                                case "end":
                                    return e.stop()
                            }
                        }), e)
                    })))), Object(O["jsxs"])(O["Fragment"], { children: [0 === (null === t || void 0 === t ? void 0 : t.planID) && b(), (null === t || void 0 === t ? void 0 : t.planID) > 0 && u()] })
                },
                R = E,
                F = n("wd/R"),
                P = n.n(F),
                q = n("ye1Q"),
                A = function() {
                    var e, t, n, l = Object(m["h"])("@@initialState"),
                        f = l.initialState,
                        p = "/plan/".concat(null === f || void 0 === f || null === (e = f.currentUser) || void 0 === e ? void 0 : e.data.plan_id),
                        h = Object(u["useState"])(),
                        g = Object(o["a"])(h, 2),
                        v = g[0],
                        k = g[1],
                        _ = Object(u["useState"])(!1),
                        y = Object(o["a"])(_, 2),
                        N = y[0],
                        S = y[1],
                        M = Object(m["g"])();
                    Object(u["useEffect"])((function() {
                        Object(i["a"])(d.a.mark((function e() {
                            var t, n;
                            return d.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(w["C"])();
                                    case 2:
                                        if (t = e.sent, n = [], void 0 !== t) { e.next = 6; break }
                                        return e.abrupt("return");
                                    case 6:
                                        t.data.map((function(e) { var t = {}; return t.key = "".concat(e.type, "-").concat(e.id.toString()), t.name = e.name, t.rate = Object(O["jsx"])(c["a"], { style: { minWidth: 60 }, children: Object(O["jsxs"])(s["b"], { children: [e.rate, "x"] }) }), e.tags instanceof Array ? t.tags = e.tags.map((function(e, t) { var n = t; return Object(O["jsx"])(b.a.Fragment, { children: Object(O["jsx"])(c["a"], { children: e }) }, n) })) : t.tags = Object(O["jsx"])(O["Fragment"], {}), null != e.last_check_at && P()().unix() - Number(e.last_check_at) <= 300 ? t.status = Object(O["jsx"])(r["a"], { status: "processing" }) : t.status = Object(O["jsx"])(r["a"], { status: "error" }), n.push(t), e })), n.length > 0 && k(n), S(!0);
                                    case 9:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), []);
                    var C = function() { return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsx"])("div", { className: "alert alert-dark", role: "alert", children: Object(O["jsxs"])(s["b"], { children: [M.formatMessage({ id: "subscribe.renew_info" }), Object(O["jsx"])(j["a"], { className: "alert-link", to: p, children: M.formatMessage({ id: "subscribe.renew" }) })] }) }) }) };
                    return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsxs"])("div", { className: "content content-full", children: [N && Object(O["jsx"])(R, {}), v && (null === f || void 0 === f || null === (t = f.currentUser) || void 0 === t ? void 0 : t.data.plan_id) > 0 && Object(O["jsx"])(x, { dataSource: v }), N && void 0 === v && (null === f || void 0 === f || null === (n = f.currentUser) || void 0 === n ? void 0 : n.data.plan_id) > 0 && C(), !1 === N && Object(O["jsx"])(a["a"], { indicator: Object(O["jsx"])(q["a"], { style: { fontSize: 24 }, spin: !0 }) })] }) })
                };
            t["default"] = A
        },
        "i6+/": function(e, t, n) {
            "use strict";
            n.r(t);
            n("DYRE");
            var a = n("zeV3"),
                r = n("9kvl"),
                c = n("55Ip"),
                s = n("nKUr"),
                i = function() { var e = Object(r["g"])(); return Object(s["jsx"])(s["Fragment"], { children: Object(s["jsx"])("div", { id: "page-container", children: Object(s["jsx"])("main", { id: "main-container", children: Object(s["jsx"])("div", { className: "bg-image", children: Object(s["jsx"])("div", { className: "hero bg-white-95", children: Object(s["jsx"])("div", { className: "hero-inner", children: Object(s["jsx"])("div", { className: "content content-full", children: Object(s["jsxs"])("div", { className: "px-3 py-5 text-center", children: [Object(s["jsxs"])("div", { className: "row", children: [Object(s["jsx"])("div", { className: "col-sm-6 text-center text-sm-right", children: Object(s["jsx"])("div", { className: "display-1 text-danger font-w700", children: "404" }) }), Object(s["jsx"])("div", { className: "col-sm-6 text-center d-sm-flex align-items-sm-center", children: Object(s["jsx"])("div", { className: "display-1 text-muted font-w300", children: "L\u1ed7i truy c\u1eadp" }) })] }), Object(s["jsx"])("div", { "data-class": "animated fadeInUp", children: Object(s["jsx"])(c["a"], { className: "btn btn-hero-secondary", to: "/", children: Object(s["jsxs"])(a["b"], { children: [Object(s["jsx"])("i", { className: "fa fa-arrow-left mr-1" }), e.formatMessage({ id: "common.back_home" })] }) }) })] }) }) }) }) }) }) }) }) };
            t["default"] = i
        },
        lnzr: function(e, t, n) {},
        pmku: function(e, t, n) {
            "use strict";
            n("2qtc");
            var a = n("kLXV"),
                r = n("93az"),
                c = n.n(r),
                s = n("q1tI"),
                i = n("nKUr"),
                o = function(e) {
                    var t = e.visible,
                        n = e.sitekey,
                        r = e.type,
                        o = e.onCancel,
                        l = e.onVerified,
                        d = Object(s["useRef"])(null),
                        u = function(e) { l(e, r) };
                    return Object(s["useEffect"])((function() { var e;!1 === t && (null === (e = d.current) || void 0 === e || e.resetCaptcha()) }), [t]), Object(i["jsx"])(i["Fragment"], { children: Object(i["jsx"])(a["a"], { footer: null, visible: t, closable: !1, centered: !0, onCancel: o, children: Object(i["jsx"])(c.a, { sitekey: n, onVerify: u, ref: d }) }) })
                };
            t["a"] = o
        },
        qwGt: function(e, t, n) {
            "use strict";
            n.d(t, "a", (function() { return c }));
            var a = n("q1tI"),
                r = n.n(a),
                c = r.a.createContext({})
        },
        "r+lG": function(e, t, n) {
            "use strict";
            n.d(t, "a", (function() { return o }));
            var a = n("k1fw"),
                r = n("9og8"),
                c = n("WmNS"),
                s = n.n(c),
                i = n("9kvl");

            function o(e) { return l.apply(this, arguments) }

            function l() {
                return l = Object(r["a"])(s.a.mark((function e(t) {
                    return s.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", Object(i["e"])("/api/v1/guest/comm/config", Object(a["a"])({ method: "GET" }, t || {})));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), l.apply(this, arguments)
            }
        },
        r34k: function(e, t, n) {
            "use strict";
            n.r(t);
            n("DYRE");
            var a = n("zeV3"),
                r = (n("5Dmo"), n("3S7+")),
                c = n("9og8"),
                s = n("tJVT"),
                i = (n("g9YV"), n("wCAj")),
                o = n("WmNS"),
                l = n.n(o),
                d = n("q1tI"),
                u = n("Lyp1"),
                b = n("CLrh"),
                m = n("wd/R"),
                j = n.n(m),
                f = n("rKuY"),
                p = n.n(f),
                h = (n("IobL"), n("cpGi")),
                O = n("QNED"),
                g = n("nKUr"),
                v = function(e, t) { var n = new Date(e); return n.setDate(n.getDate() + t), n },
                x = function(e) { return Array.from({ length: e }, (function(e, t) { return t })) },
                w = 0,
                k = 314572800,
                _ = 2147483648,
                y = 5368709120,
                N = 10737418240,
                S = function(e) { return 0 === e ? 0 : e > w && e <= k ? 1 : e > k && e <= _ ? 2 : e > _ && e <= y ? 3 : e > y && e <= N ? 4 : 5 },
                M = function() {
                    var e = j()().toDate(),
                        t = v(e, -365),
                        n = Object(d["useState"])(),
                        a = Object(s["a"])(n, 2),
                        r = a[0],
                        i = a[1];
                    return Object(d["useEffect"])((function() {
                        Object(c["a"])(l.a.mark((function t() {
                            var n, a;
                            return l.a.wrap((function(t) {
                                while (1) switch (t.prev = t.next) {
                                    case 0:
                                        return t.next = 2, Object(b["M"])({});
                                    case 2:
                                        if (n = t.sent, void 0 !== n) { t.next = 5; break }
                                        return t.abrupt("return");
                                    case 5:
                                        a = x(365).map((function(t) {
                                            var a = j()(v(e, -t)),
                                                r = a.format("YYYY-MM-DD"),
                                                c = n.data[r],
                                                s = 0,
                                                i = 0;
                                            return void 0 !== c && (s = c.total, i = S(c.total)), { date: a, dateStr: r, weight: i, total: s }
                                        })), i(a);
                                    case 7:
                                    case "end":
                                        return t.stop()
                                }
                            }), t)
                        })))()
                    }), []), Object(g["jsx"])(g["Fragment"], { children: void 0 !== r && Object(g["jsxs"])("div", { className: "col-12 m- p-0", children: [Object(g["jsx"])(p.a, { startDate: t, endDate: e, values: r, classForValue: function(e) { return e ? "color-gitlab-".concat(e.weight) : "color-empty" }, tooltipDataAttrs: function(e) { return { "data-tip": "".concat(e.dateStr, " : ").concat(Object(O["a"])(e.total)) } }, showWeekdayLabels: !1, showMonthLabels: !1 }), Object(g["jsx"])(h["a"], {})] }) })
                },
                C = M,
                T = n("9kvl"),
                I = i["a"].Column,
                D = function() {
                    var e = Object(d["useState"])(),
                        t = Object(s["a"])(e, 2),
                        n = t[0],
                        o = t[1],
                        m = Object(d["useState"])(0),
                        f = Object(s["a"])(m, 2),
                        p = f[0],
                        h = f[1],
                        v = Object(d["useState"])(1),
                        x = Object(s["a"])(v, 2),
                        w = x[0],
                        k = x[1],
                        _ = 10,
                        y = Object(T["g"])(),
                        N = function(e) {
                            if (void 0 !== w) {
                                var t = e.current;
                                k(t)
                            }
                        },
                        S = { pageSize: _, showQuickJumper: !1, showLessItems: !1, showSizeChanger: !1, showTitle: !1, total: p, size: "small" };
                    return Object(d["useEffect"])((function() {
                        Object(c["a"])(l.a.mark((function e() {
                            var t;
                            return l.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return e.next = 2, Object(b["N"])({ pageSize: _, current: w });
                                    case 2:
                                        if (t = e.sent, void 0 !== t) { e.next = 5; break }
                                        return e.abrupt("return");
                                    case 5:
                                        o(t.data), h(t.total);
                                    case 7:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })))()
                    }), [w]), Object(g["jsx"])(g["Fragment"], { children: Object(g["jsxs"])("div", { className: "content content-full", children: [Object(g["jsxs"])("div", { className: "block block-rounded block-bordered ", children: [Object(g["jsx"])("div", { className: "block-header block-header-default", children: Object(g["jsx"])("h3", { className: "block-title", children: y.formatMessage({ id: "traffic.heatmap.title" }) }) }), Object(g["jsx"])("div", { className: "block-content p-0", children: Object(g["jsx"])(C, {}) })] }), Object(g["jsxs"])("div", { className: "block block-rounded ", children: [Object(g["jsx"])("div", { class: "col-lg-12", children: Object(g["jsx"])("div", { class: "alert alert-info mb-0", role: "alert", children: Object(g["jsx"])("p", { class: "mb-0", children: y.formatMessage({ id: "traffic.list.title" }) }) }) }), Object(g["jsx"])("div", { className: "block-content p-0", children: Object(g["jsxs"])(i["a"], { rowKey: "id", dataSource: n, scroll: { x: !0 }, bordered: !1, loading: !1, pagination: S, onChange: N, children: [Object(g["jsx"])(I, { dataIndex: "log_at", title: y.formatMessage({ id: "traffic.column.log_at" }), render: function(e) { return j.a.unix(Number(e)).format("DD/MM/YYYY") } }, "log_at"), Object(g["jsx"])(I, { dataIndex: "n", title: y.formatMessage({ id: "traffic.column.n" }), render: function(e) { return Number(e).valueOf() > 0 ? Number(e).valueOf() : "-" } }, "n"), Object(g["jsx"])(I, { dataIndex: "u", title: y.formatMessage({ id: "traffic.column.u" }), render: function(e) { return Object(O["a"])(Number(e).valueOf()) } }, "u"), Object(g["jsx"])(I, { dataIndex: "d", title: y.formatMessage({ id: "traffic.column.d" }), render: function(e) { return Object(O["a"])(Number(e).valueOf()) } }, "d"), Object(g["jsx"])(I, { title: Object(g["jsx"])(g["Fragment"], { children: Object(g["jsxs"])(a["b"], { children: [y.formatMessage({ id: "traffic.column.total" }), Object(g["jsx"])(r["a"], { title: y.formatMessage({ id: "traffic.column.total.tip" }), children: Object(g["jsx"])(u["a"], {}) })] }) }), render: function(e) { return Object(O["a"])(Number(e.d) + Number(e.u)).valueOf() } })] }) })] })] }) })
                };
            t["default"] = D
        },
        sqeV: function(e, t, n) {
            "use strict";
            n("qVdP");
            var a = n("jsC+"),
                r = (n("lUTK"), n("BvKs")),
                c = n("tJVT"),
                s = n("9kvl"),
                i = n("55Ip"),
                o = n("q1tI"),
                l = n("nKUr"),
                d = function(e) {
                    var t = e.placement,
                        n = Object(o["useState"])(!1),
                        d = Object(c["a"])(n, 2),
                        u = d[0],
                        b = d[1],
                        m = function(e) { b(e) },
                        j = function(e) {
                            var t = e.key;
                            Object(s["b"])() !== t && Object(s["f"])(t, !0), b(!1)
                        },
                        f = function() { return Object(l["jsx"])(l["Fragment"], { children: Object(l["jsxs"])(r["a"], { style: { boxShadow: "0 .25rem 2rem rgba(0,0,0,.08)", borderColor: "#ebebeb" }, onClick: j, children: [Object(l["jsx"])(r["a"].Item, { children: Object(l["jsx"])(i["a"], { to: "#", style: { fontSize: "1rem" }, children: "Ti\u1ebfng Vi\u1ec7t" }) }, "vi-VN"), Object(l["jsx"])(r["a"].Item, { children: Object(l["jsx"])(i["a"], { to: "#", style: { fontSize: "1rem" }, children: "English" }) }, "en-US"), Object(l["jsx"])(r["a"].Item, { children: Object(l["jsx"])(i["a"], { to: "#", style: { fontSize: "1rem" }, children: "\u4e2d\u6587" }) }, "zh-CN")] }) }) };
                    return Object(l["jsx"])(l["Fragment"], { children: Object(l["jsx"])(a["a"], { overlay: f, placement: t, onVisibleChange: m, visible: u, children: Object(l["jsx"])("button", { type: "button", className: "btn btn-black mr-1", children: Object(l["jsx"])("i", { className: "far fa fa-language", children: " " }) }) }) })
                };
            t["a"] = d
        },
        tB8F: function(e, t, n) {
            "use strict";
            n.r(t);
            var a = {};
            n.r(a), n.d(a, "getInitialState", (function() { return g })), n.d(a, "request", (function() { return _ })), n.d(a, "onRouteChange", (function() { return y }));
            var r = {};
            n.r(r), n.d(r, "rootContainer", (function() { return I }));
            var c = {};
            n.r(c), n.d(c, "rootContainer", (function() { return E }));
            var s = {};
            n.r(s), n.d(s, "rootContainer", (function() { return $ }));
            n("pNMO"), n("4Brf"), n("tjZM"), n("3I1R"), n("7+kd"), n("0oug"), n("KhsS"), n("gOCb"), n("a57n"), n("GXvd"), n("I1Gw"), n("gXIK"), n("lEou"), n("gbiT"), n("ma9I"), n("qHT+"), n("yyme"), n("TeQF"), n("fbCW"), n("x0AG"), n("BIHw"), n("XbcX"), n("pjDv"), n("yq1k"), n("yXV3"), n("4mDm"), n("oVuX"), n("uqXc"), n("2B1R"), n("Xe3L"), n("E9XD"), n("9N29"), n("Junv"), n("+2oP"), n("ToJy"), n("94Xl"), n("pDQq"), n("QGkA"), n("c9m3"), n("wZ/5"), n("rOQg"), n("7+zs"), n("tW5y"), n("sMBO"), n("DEfu"), n("Tskq"), n("Uydy"), n("eajv"), n("n/mU"), n("PqOI"), n("QNnp"), n("/5zm"), n("CsgD"), n("9mRW"), n("QFcT"), n("vAFs"), n("a5NK"), n("yiG3"), n("kNcU"), n("KvGi"), n("AmFO"), n("eJiR"), n("I9xj"), n("tl/u"), n("qePV"), n("NbN+"), n("8AyJ"), n("i6QF"), n("kSko"), n("WDsR"), n("r/Vq"), n("5uH8"), n("w1rZ"), n("JevA"), n("toAj"), n("zKZe"), n("Eqjn"), n("5xtp"), n("T63A"), n("3KgV"), n("wfmh"), n("5DmW"), n("27RR"), n("cDke"), n("NBAS"), n("Kxld"), n("yQYn"), n("4h0Y"), n("5D5o"), n("tkto"), n("v5b1"), n("W/eh"), n("zuhW"), n("r5Og"), n("07d7"), n("B6y2"), n("5s+n"), n("p532"), n("pv2x"), n("SuFq"), n("PzqY"), n("rBZX"), n("XUE8"), n("nkod"), n("f3jH"), n("x2An"), n("25bX"), n("G/JM"), n("1t3B"), n("ftMj"), n("i5pp"), n("TWNs"), n("rB9j"), n("U3f4"), n("JfAA"), n("YGK4"), n("9bJ7"), n("inlA"), n("9tb/"), n("JTJg"), n("PKPk"), n("Rm1S"), n("hDyC"), n("TZCg"), n("2A+d"), n("OM9Z"), n("UxlC"), n("hByQ"), n("EnZy"), n("LKBx"), n("SYor"), n("HiXI"), n("7ueG"), n("GKVU"), n("E5NM"), n("BNMt"), n("zHFu"), n("x83w"), n("l2dK"), n("GRPF"), n("xdBZ"), n("mRH6"), n("yWo2"), n("IxXR"), n("TFPT"), n("Zk8X"), n("z8NH"), n("SpvK"), n("/Yfv"), n("iwkZ"), n("FDzp"), n("XMab"), n("ilnZ"), n("hMMk"), n("+ywr"), n("moxL"), n("qXVe"), n("c162"), n("waxf"), n("0TkE"), n("Onu3"), n("1dYe"), n("IL/d"), n("gvgV"), n("6R/c"), n("YL0P"), n("X5Zq"), n("MoCz"), n("P8wP"), n("7JcK"), n("ypFw"), n("JaFt"), n("zSZm"), n("PF2M"), n("KVSy"), n("ZJ55"), n("IZzc"), n("Fwt+"), n("s5qe"), n("cvf0"), n("ENF9"), n("H+LF"), n("66V8"), n("iIM6"), n("2tOg"), n("gYJb"), n("EDT/"), n("j+VE"), n("wgYD"), n("R3/m"), n("l/vG"), n("0q/z"), n("n5pg"), n("zu+z"), n("ihrJ"), n("Q7Pz"), n("unQa"), n("Vnov"), n("nIe3"), n("CUyW"), n("qc1c"), n("5921"), n("VOz1"), n("Thag"), n("9D6x"), n("cOPa"), n("vdRX"), n("KrxN"), n("SL6q"), n("lehK"), n("eO0o"), n("NqR8"), n("w7s6"), n("uWhJ"), n("WPzJ"), n("NV22"), n("ny8l"), n("a5/B"), n("vzwy"), n("pevA"), n("8go2"), n("DrvE"), n("kCkZ"), n("++zV"), n("Y4C7"), n("ZsH6"), n("vZi8"), n("5r1n"), n("sQ9d"), n("bdeN"), n("AwgR"), n("qgGA"), n("49+q"), n("AVoK"), n("hcok"), n("dNT4"), n("3uUd"), n("tijO"), n("1kQv"), n("ZY7T"), n("C1JJ"), n("lmH4"), n("Co1j"), n("5JV0"), n("ctDJ"), n("8r4s"), n("JwUS"), n("qaHo"), n("Si40"), n("BGb9"), n("fN96"), n("UzNg"), n("DhMN"), n("rZ3M"), n("apDx"), n("4XaG"), n("6V7H"), n("cfiF"), n("702D"), n("TJ79"), n("Z4nd"), n("8STE"), n("spTT"), n("rb3L"), n("FZtP"), n("3bBZ"), n("Ew+T"), n("n5b4"), n("Kz25"), n("vxnP"), n("mGGf"), n("97ZR");
            var i = n("bCY9"),
                o = (n("/xke"), n("TeRw")),
                l = n("oBTY"),
                d = n("9og8"),
                u = n("WmNS"),
                b = n.n(u),
                m = n("9kvl"),
                j = n("CLrh"),
                f = n("X8fG"),
                p = n("f0Wu"),
                h = n.n(p),
                O = n("nKUr");

            function g() { return v.apply(this, arguments) }

            function v() {
                return v = Object(d["a"])(b.a.mark((function e() {
                    var t, n;
                    return b.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                if (t = function() {
                                        var e = Object(d["a"])(b.a.mark((function e() {
                                            var t;
                                            return b.a.wrap((function(e) {
                                                while (1) switch (e.prev = e.next) {
                                                    case 0:
                                                        return e.next = 2, Object(j["R"])();
                                                    case 2:
                                                        return t = e.sent, e.abrupt("return", t);
                                                    case 4:
                                                    case "end":
                                                        return e.stop()
                                                }
                                            }), e)
                                        })));
                                        return function() { return e.apply(this, arguments) }
                                    }(), Object(f["j"])(m["c"].location.pathname)) { e.next = 6; break }
                                return e.next = 4, t();
                            case 4:
                                return n = e.sent, e.abrupt("return", { fetchUserInfo: t, currentUser: n });
                            case 6:
                                return e.abrupt("return", { fetchUserInfo: t });
                            case 7:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), v.apply(this, arguments)
            }
            h.a.tz.setDefault("Asia/Ho_Chi_Minh");
            var x = function(e) {
                    var t = e.response,
                        n = e.data,
                        a = [];
                    if (console.log(e), null !== t && 422 === t.status && Object.keys(n.errors).forEach((function(e) { a.push.apply(a, Object(l["a"])(n.errors[e])) })), null !== t && 500 === t.status && a.push(n.message), null === t || 403 !== t.status) {
                        if (a.length > 0) {
                            var r = Object(m["a"])();
                            o["default"].error({ description: a.map((function(e) { return Object(O["jsx"])("div", { children: e }, e) })), message: r.formatMessage({ id: "common.message.request_error" }) })
                        }
                    } else m["c"].replace(f["n"])
                },
                w = { prefix: f["b"], charset: "utf8", headers: { "Content-Language": Object(m["b"])() }, errorHandler: x },
                k = { prefix: f["b"], charset: "utf8", headers: { "Access-Control-Allow-Origin": f["b"], "Content-Language": Object(m["b"])(), Authorization: localStorage.getItem("auth_data") }, errorHandler: x },
                _ = f["m"] ? k : w;

            function y(e) {
                var t = e.location,
                    n = e.matchedRoutes,
                    a = n.length - 1;
                t.pathname !== n[a].match.url && m["c"].replace(f["o"])
            }
            var N = n("q1tI"),
                S = n.n(N),
                M = n("rlch"),
                C = n("I5X1");
            if ("function" !== typeof C["a"]) throw new Error("[plugin-initial-state]: useModel is not a function, @umijs/plugin-model is required.");
            var T = function(e) {
                var t = e.children,
                    n = Object(N["useRef"])(!1),
                    a = m["d"].applyPlugins({ key: "initialStateConfig", type: M["a"].modify, initialValue: {} }) || {},
                    r = Object(C["a"])("@@initialState") || {},
                    c = r.loading,
                    s = void 0 !== c && c;
                return Object(N["useEffect"])((function() { s || (n.current = !0) }), [s]), s && !n.current ? a.loading || null : t
            };

            function I(e) { return S.a.createElement(T, null, e) }
            var D = n("ZW6p");

            function E(e) { return S.a.createElement(D["b"], null, e) }
            var R = n("tJVT"),
                F = n("k1fw"),
                P = function(e) { return new Promise((function(t) { return setTimeout(t, e || 0) })) };

            function q() { return A.apply(this, arguments) }

            function A() {
                return A = Object(d["a"])(b.a.mark((function e() {
                    return b.a.wrap((function(e) {
                        while (1) switch (e.prev = e.next) {
                            case 0:
                                return e.next = 2, g();
                            case 2:
                                return e.abrupt("return", e.sent);
                            case 3:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))), A.apply(this, arguments)
            }
            var U = { initialState: void 0, loading: !0, error: void 0 },
                L = function() {
                    var e = Object(N["useState"])(U),
                        t = Object(R["a"])(e, 2),
                        n = t[0],
                        a = t[1],
                        r = Object(N["useCallback"])(Object(d["a"])(b.a.mark((function e() {
                            var t, n;
                            return b.a.wrap((function(e) {
                                while (1) switch (e.prev = e.next) {
                                    case 0:
                                        return a((function(e) { return Object(F["a"])(Object(F["a"])({}, e), {}, { loading: !0, error: void 0 }) })), e.prev = 1, t = function() { return new Promise((function(e) { return e(q()) })) }, e.next = 5, t();
                                    case 5:
                                        n = e.sent, a((function(e) { return Object(F["a"])(Object(F["a"])({}, e), {}, { initialState: n, loading: !1 }) })), e.next = 12;
                                        break;
                                    case 9:
                                        e.prev = 9, e.t0 = e["catch"](1), a((function(t) { return Object(F["a"])(Object(F["a"])({}, t), {}, { error: e.t0, loading: !1 }) }));
                                    case 12:
                                        return e.next = 14, P(10);
                                    case 14:
                                    case "end":
                                        return e.stop()
                                }
                            }), e, null, [
                                [1, 9]
                            ])
                        }))), []),
                        c = Object(N["useCallback"])(function() {
                            var e = Object(d["a"])(b.a.mark((function e(t) {
                                return b.a.wrap((function(e) {
                                    while (1) switch (e.prev = e.next) {
                                        case 0:
                                            return a((function(e) { return "function" === typeof t ? Object(F["a"])(Object(F["a"])({}, e), {}, { initialState: t(e.initialState), loading: !1 }) : Object(F["a"])(Object(F["a"])({}, e), {}, { initialState: t, loading: !1 }) })), e.next = 3, P(10);
                                        case 3:
                                        case "end":
                                            return e.stop()
                                    }
                                }), e)
                            })));
                            return function(t) { return e.apply(this, arguments) }
                        }(), []);
                    return Object(N["useEffect"])((function() { r() }), []), Object(F["a"])(Object(F["a"])({}, n), {}, { refresh: r, setInitialState: c })
                },
                V = function() {
                    var e = function() {
                            var e = new Date,
                                t = e.getFullYear();
                            return t
                        },
                        t = function(e, t) { return e[t] };
                    return { yearCopy: e, getOwnProperty: t }
                },
                G = { data: { dashboard: { name: "module.dashboard", path: "/dashboard", icon: "speedometer" }, knowledge: { name: "module.knowledge", path: "/knowledge", icon: "book-open" }, subscribe: { name: "module.subscribe", path: "/subscribe", icon: "badge" }, plan: { name: "module.plan", path: "/plan", icon: "bag" }, order: { name: "module.order", path: "/order", icon: "list" }, invite: { name: "module.invite", path: "/invite", icon: "users" }, profile: { name: "module.profile", path: "/profile", icon: "user" }, ticket: { name: "module.ticket", path: "/ticket", icon: "support" }, traffic: { name: "module.traffic", path: "/traffic", icon: "bar-chart" } }, getPath: function(e) { return G.data[e] ? G.data[e].path : "" }, getIcon: function(e) { return G.data[e] ? G.data[e].icon : "" }, getName: function(e) { return G.data[e] ? Object(m["a"])().formatMessage({ id: G.data[e].name }) : "" }, getIndex: function(e) { var t = ""; return Object.keys(G.data).forEach((function(n) { return G.data[n] && G.data[n].path === e && (t = n), G.data[n] })), t }, testIndex: function(e, t) { return void 0 === G.data[e] && G.data[e].path === t } },
                Y = function() {
                    var e = Object(N["useState"])("0"),
                        t = Object(R["a"])(e, 2),
                        n = t[0],
                        a = t[1],
                        r = Object(N["useState"])(""),
                        c = Object(R["a"])(r, 2),
                        s = c[0],
                        i = c[1];
                    return { menus: G, menuIndex: n, menuName: s, setMenuName: i, setMenuIndex: a }
                },
                B = n("R5vp"),
                z = n("fWQN"),
                H = function e() {
                    var t = this;
                    Object(z["a"])(this, e), this.callbacks = {}, this.data = {}, this.update = function(e) {
                        (t.callbacks[e] || []).forEach((function(n) {
                            try {
                                var a = t.data[e];
                                n(a)
                            } catch (r) { n(void 0) }
                        }))
                    }
                },
                K = (n("jrin"), function(e) {
                    var t = e.hook,
                        n = e.onUpdate,
                        a = e.namespace,
                        r = Object(N["useRef"])(n);
                    r.current = n;
                    var c, s = Object(N["useRef"])(!1);
                    try { c = t() } catch (i) { console.error("plugin-model: Invoking '".concat(a || "unknown", "' model failed:"), i) }
                    return Object(N["useMemo"])((function() { r.current(c), s.current = !1 }), []), Object(N["useEffect"])((function() { s.current ? r.current(c) : s.current = !0 })), Object(O["jsx"])(O["Fragment"], {})
                }),
                W = n("qwGt"),
                J = { "@@initialState": L, useCommonModel: V, useMenuModel: Y, useSubModel: B["a"] },
                X = new H,
                Q = K,
                Z = function(e) {
                    var t = e.children;
                    return Object(O["jsxs"])(W["a"].Provider, {
                        value: X,
                        children: [Object.entries(J).map((function(e) {
                            return Object(O["jsx"])(Q, {
                                namespace: e[0],
                                hook: e[1],
                                onUpdate: function(t) {
                                    var n = e,
                                        a = Object(R["a"])(n, 1),
                                        r = a[0];
                                    X.data[r] = t, X.update(r)
                                }
                            }, e[0])
                        })), t]
                    })
                };

            function $(e) { return S.a.createElement(Z, null, e) }
            i["a"].register({ apply: a, path: "abc" }), i["a"].register({ apply: r, path: "../plugin-initial-state/runtime" }), i["a"].register({ apply: c, path: "abc" }), i["a"].register({ apply: s, path: "../plugin-model/runtime" });
            var ee = n("FfOG"),
                te = n("/dmz"),
                ne = function() { return Object(O["jsx"])(O["Fragment"], { children: Object(O["jsx"])("div", { className: "content content-full", children: Object(O["jsx"])("div", { className: "spinner-grow text-primary", role: "status", children: Object(O["jsx"])("span", { className: "sr-only", children: "Loading..." }) }) }) }) },
                ae = ne;

            function re() { var e = [{ path: "/", component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "+ego")) }, loading: ae }), routes: [{ path: "/404", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "i6+/")) }, loading: ae }) }, { path: "/dashboard", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "0rWx")) }, loading: ae }) }, { path: "/forget", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "C6Gj")) }, loading: ae }) }, { path: "/", exact: !0, component: Object(M["c"])({ loader: function() { return n.e(0).then(n.bind(null, "QeBL")) }, loading: ae }) }, { path: "/invite", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "SboD")) }, loading: ae }) }, { path: "/knowledge", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "0JFy")) }, loading: ae }) }, { path: "/login", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "A8du")) }, loading: ae }) }, { path: "/order", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "AzOF")) }, loading: ae }) }, { path: "/order/:id", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "Ts/n")) }, loading: ae }) }, { path: "/plan", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "Pqqt")) }, loading: ae }) }, { path: "/plan/:id", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "Lcwg")) }, loading: ae }) }, { path: "/profile", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "a+qF")) }, loading: ae }) }, { path: "/register", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "5Qn7")) }, loading: ae }) }, { path: "/subscribe", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "gaw8")) }, loading: ae }) }, { path: "/ticket", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "SDuW")) }, loading: ae }) }, { path: "/ticket/:id", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "GQ4l")) }, loading: ae }) }, { path: "/traffic", exact: !0, component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "r34k")) }, loading: ae }) }, { component: Object(M["c"])({ loader: function() { return Promise.all([n.e(1), n.e(0)]).then(n.bind(null, "i6+/")) }, loading: ae }) }] }]; return i["a"].applyPlugins({ key: "patchRoutes", type: M["a"].event, args: { routes: e } }), e }
            n("AQSi");
            Object(D["c"])();
            var ce = function() { var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}; return i["a"].applyPlugins({ key: "render", type: M["a"].compose, initialValue: function() { var t = i["a"].applyPlugins({ key: "modifyClientRenderOpts", type: M["a"].modify, initialValue: { routes: e.routes || re(), plugin: i["a"], history: Object(ee["a"])(e.hot), isServer: Object({ NODE_ENV: "production" }).__IS_SERVER, dynamicImport: !0, rootElement: "root" } }); return Object(te["a"])(t) }, args: e }) },
                se = ce();
            t["default"] = se();
            window.g_umi = { version: "3.5.20" }
        },
        u2Z1: function(e, t, n) {
            "use strict";
            n("bbsP");
            var a = n("/wGt"),
                r = (n("J+/v"), n("MoRW")),
                c = (n("+L6B"), n("2/Rp")),
                s = (n("miYZ"), n("tsqr")),
                i = n("9og8"),
                o = n("tJVT"),
                l = n("WmNS"),
                d = n.n(l),
                u = n("q1tI"),
                b = n("CLrh"),
                m = n("ye1Q"),
                j = n("wd/R"),
                f = n.n(j),
                p = n("ET/R"),
                h = n("9kvl"),
                O = n("55Ip"),
                g = n("1M3H"),
                v = n.n(g),
                x = n("k1tg"),
                w = n("nKUr"),
                k = new v.a({ html: !0 }),
                _ = function(e) {
                    var t, n = e.knowledges,
                        l = e.categories,
                        j = Object(u["useState"])(),
                        g = Object(o["a"])(j, 2),
                        v = g[0],
                        _ = g[1],
                        y = Object(u["useState"])(!1),
                        N = Object(o["a"])(y, 2),
                        S = N[0],
                        M = N[1],
                        C = Object(u["useState"])(!1),
                        T = Object(o["a"])(C, 2),
                        I = T[0],
                        D = T[1],
                        E = Object(h["h"])("useSubModel"),
                        R = E.subState,
                        F = E.initSubState,
                        P = Object(h["g"])();
                    Object(p["a"])((function() { F() }));
                    var q = function() { M(!0) },
                        A = function() { M(!1), _(void 0) },
                        U = function(e, t) {
                            Object(i["a"])(d.a.mark((function n() {
                                var a;
                                return d.a.wrap((function(n) {
                                    while (1) switch (n.prev = n.next) {
                                        case 0:
                                            if (e.preventDefault(), 1 !== t.free && !0 !== R.isAvailable) { n.next = 11; break }
                                            return n.next = 4, Object(b["j"])({ id: t.id });
                                        case 4:
                                            if (a = n.sent, void 0 !== a) { n.next = 7; break }
                                            return n.abrupt("return");
                                        case 7:
                                            _(a), D(!1), n.next = 12;
                                            break;
                                        case 11:
                                            D(!0);
                                        case 12:
                                            q();
                                        case 13:
                                        case "end":
                                            return n.stop()
                                    }
                                }), n)
                            })))()
                        };
                    return window.copy = function(e) { Object(x["a"])(e), s["default"].success(P.formatMessage({ id: "common.message.copy_success" })) }, Object(w["jsxs"])(w["Fragment"], { children: [l && l.map((function(e, t) { var a = t; return Object(w["jsx"])("div", { className: "row", children: Object(w["jsx"])("div", { className: "col-md-12", children: Object(w["jsxs"])("div", { className: "block block-rounded block-bordered", children: [Object(w["jsx"])("div", { className: "block-header block-header-default", children: Object(w["jsx"])("h3", { className: "block-title", children: e }) }), Object(w["jsx"])("div", { className: "list-group", children: null === n || void 0 === n ? void 0 : n.data[e].map((function(e) { return Object(w["jsxs"])(O["a"], { className: "list-group-item list-group-item-action", to: "#", onClick: function(t) { U(t, e) }, children: [Object(w["jsx"])("h5", { className: "font-size-base mb-1", children: e.title }), Object(w["jsxs"])("small", { children: [P.formatMessage({ id: "knowledge.last_update" }), ":", f.a.unix(Number(e.updated_at)).format("l")] })] }, e.id) })) })] }) }) }, a) })), Object(w["jsxs"])(a["a"], { title: I ? "" : null !== (t = null === v || void 0 === v ? void 0 : v.data.title) && void 0 !== t ? t : "Loading...", placement: "right", closable: !0, onClose: A, visible: S, width: "80%", children: [!1 === I && (void 0 !== (null === v || void 0 === v ? void 0 : v.data.body) ? Object(w["jsx"])("div", { dangerouslySetInnerHTML: { __html: k.render(v.data.body) } }) : Object(w["jsx"])(m["a"], {})), !0 === I && Object(w["jsx"])(r["a"], { title: P.formatMessage({ id: "knowledge.lock.title" }), extra: Object(w["jsx"])(c["a"], { type: "primary", onClick: function(e) { e.preventDefault(), h["c"].push("/plan") }, children: P.formatMessage({ id: "knowledge.lock.btn" }) }) })] })] })
                };
            t["a"] = _
        },
        vjGn: function(e, t, n) {
            "use strict";
            n("qVdP");
            var a = n("jsC+"),
                r = (n("lUTK"), n("BvKs")),
                c = (n("miYZ"), n("tsqr")),
                s = n("tJVT"),
                i = n("q1tI"),
                o = n("9kvl"),
                l = n("55Ip"),
                d = n("R0hO"),
                u = n("+rR5"),
                b = n("k1tg"),
                m = n("nKUr"),
                j = function(e) {
                    var t = e.subscribeUrl,
                        n = e.clashUrl,
                        j = e.surgeUrl,
                        f = e.stashUrl,
                        p = e.shadowrocketUrl,
                        h = e.quantumultXUrl,
                        O = Object(i["useState"])(!1),
                        g = Object(s["a"])(O, 2),
                        v = g[0],
                        x = g[1],
                        w = Object(i["useState"])(""),
                        k = Object(s["a"])(w, 2),
                        _ = k[0],
                        y = k[1],
                        N = u["a"].detect(),
                        S = Object(o["g"])(),
                        M = function(e) { e.preventDefault(), Object(b["a"])(t), c["default"].success(S.formatMessage({ id: "common.message.copy_success" })) },
                        C = function(e) {
                            e.preventDefault();
                            var n = t + "&flag=clash";
                            Object(b["a"])(n), c["default"].success(S.formatMessage({ id: "common.message.copy_success" }))
                        },
                        T = function(e) { e.preventDefault(), x(!0), y(t) },
                        I = Object(m["jsx"])(m["Fragment"], { children: Object(m["jsxs"])(r["a"], { selectable: !1, children: [Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])(l["a"], { to: "", onClick: function(e) { M(e) }, children: [Object(m["jsx"])("i", { className: "fa fa-copy mr-2" }), S.formatMessage({ id: "subscribe.oneclick.copy_url" })] }) }, "0"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])(l["a"], { to: "", onClick: function(e) { C(e) }, children: [Object(m["jsx"])("i", { className: "far fa-copy mr-2" }), S.formatMessage({ id: "subscribe.oneclick.copy_clash_url" })] }) }, "1"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])(l["a"], { to: "", onClick: function(e) { T(e) }, children: [Object(m["jsx"])("i", { className: "fa fa-qrcode mr-2" }), S.formatMessage({ id: "subscribe.oneclick.view_qrcode" })] }) }, "2"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])("a", { href: n, children: [Object(m["jsx"])("i", { className: "fa fa-share mr-2" }), S.formatMessage({ id: "subscribe.oneclick.export" }, { name: "Clash" })] }) }, "3")] }) }),
                        D = Object(m["jsx"])(m["Fragment"], { children: Object(m["jsxs"])(r["a"], { selectable: !1, children: [Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])(l["a"], { to: "", onClick: function(e) { M(e) }, children: [Object(m["jsx"])("i", { className: "fa fa-copy mr-2" }), S.formatMessage({ id: "subscribe.oneclick.copy_url" })] }) }, "0"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])(l["a"], { to: "", onClick: function(e) { T(e) }, children: [Object(m["jsx"])("i", { className: "fa fa-qrcode mr-2" }), S.formatMessage({ id: "subscribe.oneclick.view_qrcode" })] }) }, "1"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])("a", { href: p, children: [Object(m["jsx"])("i", { className: "fa fa-share mr-2" }), S.formatMessage({ id: "subscribe.oneclick.export" }, { name: "Shadowrocket" })] }) }, "2"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])("a", { href: h, children: [Object(m["jsx"])("i", { className: "fa fa-share mr-2" }), S.formatMessage({ id: "subscribe.oneclick.export" }, { name: "QuantumultX" })] }) }, "3"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])("a", { href: j, children: [Object(m["jsx"])("i", { className: "fa fa-share mr-2" }), S.formatMessage({ id: "subscribe.oneclick.export" }, { name: "Surge" })] }) }, "4"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])("a", { href: f, children: [Object(m["jsx"])("i", { className: "fa fa-share mr-2" }), S.formatMessage({ id: "subscribe.oneclick.export" }, { name: "Stash" })] }) }, "5")] }) }),
                        E = Object(m["jsx"])(m["Fragment"], { children: Object(m["jsxs"])(r["a"], { selectable: !1, children: [Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])(l["a"], { to: "", onClick: function(e) { M(e) }, children: [Object(m["jsx"])("i", { className: "fa fa-copy mr-2" }), S.formatMessage({ id: "subscribe.oneclick.copy_url" })] }) }, "0"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])(l["a"], { to: "", onClick: function(e) { T(e) }, children: [Object(m["jsx"])("i", { className: "fa fa-qrcode mr-2" }), S.formatMessage({ id: "subscribe.oneclick.view_qrcode" })] }) }, "1"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])("a", { href: n, children: [Object(m["jsx"])("i", { className: "fa fa-share mr-2" }), S.formatMessage({ id: "subscribe.oneclick.export" }, { name: "Clash For Android" })] }) }, "2"), Object(m["jsx"])(r["a"].Item, { children: Object(m["jsxs"])("a", { href: j, children: [Object(m["jsx"])("i", { className: "fa fa-share mr-2" }), S.formatMessage({ id: "subscribe.oneclick.export" }, { name: "Surfboard" })] }) }, "3")] }) }),
                        R = function() { return N.os.isiOS() || N.os.isOSX() && navigator.maxTouchPoints > 1 ? D : N.os.isOSX() || N.os.isWindows() ? I : N.os.isAndroid() ? E : Object(m["jsx"])(m["Fragment"], {}) };
                    return Object(m["jsxs"])(m["Fragment"], { children: [N.os.isFreeBSD() || N.os.isLinux() || N.os.isSolaris() || N.os.isChromeOS() ? Object(m["jsxs"])(l["a"], { className: "btn btn-sm btn-primary btn-rounded px-3 mr-1 my-1", to: "", onClick: function(e) { M(e) }, children: [Object(m["jsx"])("i", { className: "fa fa-copy mr-1" }), S.formatMessage({ id: "subscribe.oneclick.copy_btn" })] }) : Object(m["jsx"])(a["a"], { overlay: R(), placement: "bottomLeft", trigger: ["click"], children: Object(m["jsxs"])(l["a"], { className: "btn btn-sm btn-primary btn-rounded px-3 mr-1 my-1", to: "", onClick: function(e) { e.preventDefault() }, children: [Object(m["jsx"])("i", { className: "fa fa-rss mr-1" }), S.formatMessage({ id: "subscribe.oneclick.btn" })] }) }), Object(m["jsx"])(d["a"], { url: _, visible: v, onCancel: function() { x(!1) }, title: Object(m["jsx"])("div", { style: { textAlign: "center" }, children: S.formatMessage({ id: "subscribe.oneclick.view_qrcode" }) }) })] })
                };
            t["a"] = j
        },
        xR9T: function(e, t, n) {}
    }
]);