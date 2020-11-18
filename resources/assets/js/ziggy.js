    var Ziggy = {
        namedRoutes: {"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"forgot-password","methods":["POST"],"domain":null},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"reset-password","methods":["POST"],"domain":null},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"],"domain":null},"user-password.update":{"uri":"user\/password","methods":["PUT"],"domain":null},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"],"domain":null},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"],"domain":null},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"],"domain":null},"user.index":{"uri":"user","methods":["GET","HEAD"],"domain":null},"user.create":{"uri":"user\/create","methods":["GET","HEAD"],"domain":null},"user.store":{"uri":"user","methods":["POST"],"domain":null},"user.show":{"uri":"user\/{user}","methods":["GET","HEAD"],"domain":null},"user.edit":{"uri":"user\/{user}\/edit","methods":["GET","HEAD"],"domain":null},"user.update":{"uri":"user\/{user}","methods":["PUT","PATCH"],"domain":null},"user.destroy":{"uri":"user\/{user}","methods":["DELETE"],"domain":null},"role.grant-permission":{"uri":"role\/{role}","methods":["POST"],"domain":null},"role.index":{"uri":"role","methods":["GET","HEAD"],"domain":null},"role.create":{"uri":"role\/create","methods":["GET","HEAD"],"domain":null},"role.store":{"uri":"role","methods":["POST"],"domain":null},"role.show":{"uri":"role\/{role}","methods":["GET","HEAD"],"domain":null},"role.edit":{"uri":"role\/{role}\/edit","methods":["GET","HEAD"],"domain":null},"role.update":{"uri":"role\/{role}","methods":["PUT","PATCH"],"domain":null},"role.destroy":{"uri":"role\/{role}","methods":["DELETE"],"domain":null},"profile.index":{"uri":"profile","methods":["GET","HEAD"],"domain":null},"profile.create":{"uri":"profile\/create","methods":["GET","HEAD"],"domain":null},"profile.store":{"uri":"profile","methods":["POST"],"domain":null},"profile.show":{"uri":"profile\/{profile}","methods":["GET","HEAD"],"domain":null},"profile.edit":{"uri":"profile\/{profile}\/edit","methods":["GET","HEAD"],"domain":null},"profile.update":{"uri":"profile\/{profile}","methods":["PUT","PATCH"],"domain":null},"profile.destroy":{"uri":"profile\/{profile}","methods":["DELETE"],"domain":null}},
        baseUrl: 'http://localhost:8000/',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: 8000,
        defaultParameters: []
    };

    if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
