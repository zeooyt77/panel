<?php

namespace Finexlyx\Http\Controllers\Admin;

class ServerController {
    public function index() {
        return view('admin.servers.index', [
            'servers' => Server::paginate(50),
        ]);
    }

    public function store(ServerRequest $request) {
        $server = new Server();
        $server->name = $request->input('name');
        $server->memory = $request->input('memory');
        $server->disk = $request->input('disk');
        $server->cpu = $request->input('cpu');
        $server->save();

        return redirect()->route('admin.servers');
    }
}