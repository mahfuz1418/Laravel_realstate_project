<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentDashboard extends Controller
{
    public function AgentDashboard()
    {
        return view('agent.agent_dashboard');
    }
}
