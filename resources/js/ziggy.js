const Ziggy = {"url":"http:\/\/127.0.0.1:8000","port":8000,"defaults":{},"routes":{"HomePage":{"uri":"\/","methods":["GET","HEAD"]},"register":{"uri":"register","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"login":{"uri":"login","methods":["GET","HEAD"]},"AboutUs":{"uri":"aboutUs","methods":["GET","HEAD"]}}}

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes)
}

export { Ziggy }
