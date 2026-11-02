@extends('member.layouts.main')
@section('title', 'View Geneology')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                            Content body start
                                                                                                                                                                                                                                                                                                        ***********************************-->
    <div class="content-body">
        @php
            // Fetch sponsor of the current viewed user
            $sponsor = null;
            if (!empty($data['sponsorid'])) {
                $sponsor = \App\Models\MemberDetail::where('memberid', $data['sponsorid'])->first();
            }
            
            // Prepare directs data with investments and details
            $directsList = [];
            foreach ($directs as $dt) {
                $directsList[] = [
                    'id' => $dt->id,
                    'memberid' => $dt->memberid,
                    'first_name' => $dt->first_name,
                    'last_name' => $dt->last_name,
                    'email' => $dt->email,
                    'created_at' => $dt->created_at ? $dt->created_at->format('Y-m-d H:i:s') : '',
                    'profile_image' => $dt->profile_image,
                    'status' => $dt->status ?? 'Active',
                    'downline' => $dt->downline ?? 0,
                    'sponsorid' => $dt->sponsorid,
                    'investment' => totalInvestment($dt->memberid) - selfBizDeinvest($dt->memberid),
                ];
            }
            
            $sponsorData = null;
            if ($sponsor) {
                $sponsorData = [
                    'id' => $sponsor->id,
                    'memberid' => $sponsor->memberid,
                    'first_name' => $sponsor->first_name,
                    'last_name' => $sponsor->last_name,
                    'email' => $sponsor->email,
                    'created_at' => $sponsor->created_at ? $sponsor->created_at->format('Y-m-d H:i:s') : '',
                    'profile_image' => $sponsor->profile_image,
                    'status' => $sponsor->status ?? 'Active',
                    'downline' => $sponsor->downline ?? 0,
                    'sponsorid' => $sponsor->sponsorid,
                    'investment' => totalInvestment($sponsor->memberid) - selfBizDeinvest($sponsor->memberid),
                ];
            }
            
            $currentUserData = [
                'id' => $data->id,
                'memberid' => $data->memberid,
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'email' => $data->email,
                'created_at' => $data->created_at ? $data->created_at->format('Y-m-d H:i:s') : '',
                'profile_image' => $data->profile_image,
                'status' => $data->status ?? 'Active',
                'downline' => $data->downline ?? 0,
                'sponsorid' => $data->sponsorid,
                'investment' => totalInvestment($data->memberid) - selfBizDeinvest($data->memberid),
            ];
        @endphp

        <style>
            .genealogy-container {
                --g-bg: #070a13;
                --g-card-bg: rgba(13, 20, 38, 0.85);
                --g-neon-green: #00ffaa;
                --g-neon-glow: rgba(0, 255, 170, 0.4);
                --g-neon-dim: rgba(0, 255, 170, 0.08);
                --g-border: rgba(255, 255, 255, 0.08);
                --g-text-main: #f8fafc;
                --g-text-muted: #94a3b8;
                --g-active: #00ffaa;
                --g-temp: #ffaa00;
                --g-deactive: #ff3366;
                
                background: #03060f;
                border-radius: 20px;
                padding: 24px;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
                position: relative;
                z-index: 1;
                overflow: hidden;
                font-family: 'Inter', -apple-system, sans-serif;
            }
            
            /* Visual modes bar */
            .genealogy-modes-bar {
                display: flex;
                align-items: center;
                gap: 16px;
                background: rgba(13, 20, 38, 0.6);
                border: 1px solid var(--g-border);
                backdrop-filter: blur(10px);
                padding: 10px 20px;
                border-radius: 16px;
                margin-bottom: 24px;
                flex-wrap: wrap;
            }
            .modes-label {
                color: var(--g-text-muted);
                font-weight: 700;
                font-size: 0.75rem;
                text-transform: uppercase;
                letter-spacing: 1.5px;
            }
            .modes-buttons {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
            }
            .mode-btn {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid var(--g-border);
                color: var(--g-text-muted);
                padding: 8px 16px;
                border-radius: 10px;
                font-weight: 600;
                font-size: 0.8rem;
                display: flex;
                align-items: center;
                gap: 8px;
                transition: all 0.3s ease;
                cursor: pointer;
            }
            .mode-btn i {
                font-size: 1rem;
            }
            .mode-btn:hover {
                color: var(--g-text-main);
                border-color: rgba(0, 255, 170, 0.4);
                background: var(--g-neon-dim);
            }
            .mode-btn.active {
                background: var(--g-neon-green) !important;
                border-color: var(--g-neon-green) !important;
                color: #030712 !important;
                box-shadow: 0 0 15px var(--g-neon-glow);
                font-weight: 700;
            }
            .mode-btn.active i {
                color: #030712 !important;
            }

            /* Filters bar */
            .genealogy-filters-bar {
                display: flex;
                gap: 16px;
                margin-bottom: 24px;
                flex-wrap: wrap;
            }
            .search-box-wrap {
                position: relative;
                flex: 1;
                min-width: 250px;
            }
            .search-box-wrap i {
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--g-text-muted);
                font-size: 1.2rem;
            }
            .search-box-wrap input {
                width: 100%;
                background: rgba(13, 20, 38, 0.6);
                border: 1px solid var(--g-border);
                border-radius: 12px;
                padding: 12px 16px 12px 42px;
                color: var(--g-text-main);
                font-size: 0.9rem;
                transition: all 0.3s ease;
            }
            .search-box-wrap input:focus {
                border-color: var(--g-neon-green);
                box-shadow: 0 0 12px var(--g-neon-dim);
                outline: none;
            }
            .filter-dropdown-wrap {
                min-width: 160px;
            }
            .filter-select {
                width: 100%;
                background: rgba(13, 20, 38, 0.6);
                border: 1px solid var(--g-border);
                border-radius: 12px;
                padding: 12px 16px;
                color: var(--g-text-main);
                font-size: 0.9rem;
                cursor: pointer;
                transition: all 0.3s ease;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-image: url("data:image/svg+xml;utf8,<svg fill='white' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
                background-repeat: no-repeat;
                background-position: right 12px center;
                background-size: 18px;
            }
            .filter-select:focus {
                border-color: var(--g-neon-green);
                outline: none;
            }

            /* Canvas Container */
            .genealogy-canvas-container {
                background-color: var(--g-bg);
                background-image: 
                    linear-gradient(rgba(0, 255, 170, 0.02) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(0, 255, 170, 0.02) 1px, transparent 1px);
                background-size: 40px 40px;
                background-position: center;
                position: relative;
                z-index: 1;
                width: 100%;
                height: 600px;
                border-radius: 20px;
                border: 1px solid var(--g-border);
                overflow: hidden;
                cursor: grab;
                box-shadow: inset 0 0 40px rgba(0,0,0,0.8);
            }
            .genealogy-canvas-container:active {
                cursor: grabbing;
            }
            .canvas-helper {
                position: absolute;
                top: 20px;
                left: 20px;
                background: rgba(13, 20, 38, 0.85);
                border: 1px solid var(--g-border);
                padding: 8px 16px;
                border-radius: 30px;
                display: flex;
                align-items: center;
                gap: 8px;
                z-index: 10;
                pointer-events: none;
                font-size: 0.75rem;
                color: var(--g-text-muted);
                backdrop-filter: blur(10px);
            }
            .canvas-helper i {
                font-size: 0.95rem;
                color: var(--g-neon-green);
            }
            
            /* Canvas controls */
            .canvas-controls {
                position: absolute;
                top: 20px;
                right: 20px;
                display: flex;
                gap: 8px;
                z-index: 10;
            }
            .canvas-controls button {
                background: rgba(13, 20, 38, 0.85);
                border: 1px solid var(--g-border);
                color: var(--g-text-main);
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }
            .canvas-controls button:hover {
                border-color: var(--g-neon-green);
                color: var(--g-neon-green);
                box-shadow: 0 0 10px var(--g-neon-dim);
                transform: scale(1.05);
            }
            .canvas-controls button i {
                font-size: 1.2rem;
            }

            /* Viewport */
            .canvas-viewport {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                transform-origin: 0 0;
                will-change: transform;
            }
            .connections-svg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: 1;
            }
            .nodes-container {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 2;
                pointer-events: none;
            }
            .nodes-container * {
                pointer-events: auto;
            }

            /* Node Card design */
            .node-card {
                background: var(--g-card-bg);
                border: 1px solid var(--g-border);
                width: 240px;
                border-radius: 16px;
                padding: 16px;
                position: relative;
                cursor: pointer;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255,255,255,0.05);
                backdrop-filter: blur(12px);
                user-select: none;
            }
            .node-card:hover {
                transform: translateY(-5px);
                border-color: var(--g-neon-green);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6), 0 0 20px rgba(0, 255, 170, 0.2);
            }
            .node-card.current-user-node {
                border-color: rgba(0, 255, 170, 0.5);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(0, 255, 170, 0.15);
            }
            .node-card.current-user-node::after {
                content: '';
                position: absolute;
                inset: 0;
                border-radius: 16px;
                border: 1.5px solid var(--g-neon-green);
                opacity: 0.7;
                pointer-events: none;
                animation: pulseGlow 2s infinite alternate;
            }
            @keyframes pulseGlow {
                0% { box-shadow: 0 0 5px rgba(0, 255, 170, 0.2); opacity: 0.5; }
                100% { box-shadow: 0 0 20px rgba(0, 255, 170, 0.5); opacity: 0.9; }
            }
            
            .node-card-inner {
                display: flex;
                align-items: center;
                gap: 14px;
            }
            .node-avatar-wrap {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                overflow: hidden;
                border: 2px solid rgba(255, 255, 255, 0.1);
                background: rgba(0, 0, 0, 0.3);
                flex-shrink: 0;
            }
            .node-avatar {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .node-info {
                flex-grow: 1;
                min-width: 0;
            }
            .node-name {
                color: var(--g-text-main);
                font-weight: 700;
                font-size: 0.9rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                margin-bottom: 2px;
            }
            .node-id-badge {
                font-size: 0.7rem;
                color: var(--g-neon-green);
                background: var(--g-neon-dim);
                padding: 2px 8px;
                border-radius: 4px;
                display: inline-block;
                font-weight: 700;
                letter-spacing: 0.5px;
                margin-bottom: 4px;
            }
            .node-sponsor {
                color: var(--g-text-muted);
                font-size: 0.7rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .node-status-dot {
                position: absolute;
                bottom: 12px;
                right: 12px;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                border: 2px solid var(--g-card-bg);
            }
            .status-active {
                background: var(--g-active);
                box-shadow: 0 0 8px var(--g-active);
            }
            .status-temp {
                background: var(--g-temp);
                box-shadow: 0 0 8px var(--g-temp);
            }
            .status-deactive {
                background: var(--g-deactive);
                box-shadow: 0 0 8px var(--g-deactive);
            }

            /* Tooltip detail card */
            .node-tooltip-card {
                position: absolute;
                background: rgba(8, 12, 23, 0.96);
                border: 1px solid rgba(0, 255, 170, 0.4);
                box-shadow: 0 20px 50px rgba(0,0,0,0.8), 0 0 25px rgba(0, 255, 170, 0.15);
                border-radius: 16px;
                width: 280px;
                padding: 18px;
                z-index: 100;
                display: none;
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
                backdrop-filter: blur(15px);
            }
            
            /* View layouts */
            .tree-layout {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 60px;
                padding: 80px;
                width: max-content;
                min-width: 100%;
            }
            .tree-level {
                display: flex;
                justify-content: center;
                gap: 40px;
                width: 100%;
            }
            
            .org-layout {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 80px;
                padding: 80px;
                width: max-content;
                min-height: 100%;
            }
            .org-column {
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 30px;
                height: 100%;
            }
            
            .no-downlines-card {
                background: rgba(255, 255, 255, 0.02);
                border: 1px dashed var(--g-border);
                color: var(--g-text-muted);
                padding: 16px 32px;
                border-radius: 12px;
                font-weight: 500;
                font-size: 0.85rem;
                text-align: center;
                width: 240px;
            }

            /* Compact mode tree style */
            .compact-tree-node {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 8px 12px;
                border-radius: 8px;
                background: rgba(255, 255, 255, 0.01);
                border: 1px solid transparent;
                margin-bottom: 6px;
            }
            .compact-tree-node:hover {
                background: rgba(255, 255, 255, 0.03);
                border-color: var(--g-border);
            }
            .compact-node-info {
                display: flex;
                align-items: center;
                flex-grow: 1;
            }
            .compact-node-name {
                font-size: 0.9rem;
            }
            .compact-node-id {
                font-size: 0.75rem;
                margin-left: 8px;
            }
            .compact-view-btn {
                background: none;
                border: none;
                color: var(--g-text-muted);
                cursor: pointer;
                transition: color 0.2s ease;
                padding: 0 4px;
            }
            .compact-view-btn:hover {
                color: var(--g-neon-green);
            }

            /* Sorting, Filtering hidden states */
            .node-card.filtered-out {
                opacity: 0.15;
                pointer-events: none;
                filter: grayscale(0.8);
            }
            .node-card.search-matched {
                animation: pulseMatch 1.5s infinite alternate;
                border-color: var(--g-neon-green);
            }
            @keyframes pulseMatch {
                0% { transform: scale(1); box-shadow: 0 0 10px rgba(0, 255, 170, 0.3); }
                100% { transform: scale(1.05); box-shadow: 0 0 30px rgba(0, 255, 170, 0.7); }
            }

            /* Fullscreen styling overrides */
            .genealogy-canvas-container:fullscreen {
                width: 100vw !important;
                height: 100vh !important;
                border-radius: 0;
            }

            /* Responsive media queries */
            @media (max-width: 768px) {
                .genealogy-container {
                    padding: 12px;
                }
                .genealogy-modes-bar {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    padding: 8px 12px;
                    border-radius: 12px;
                    margin-bottom: 16px;
                    width: 100%;
                    overflow-x: auto;
                    white-space: nowrap;
                    -webkit-overflow-scrolling: touch;
                    flex-wrap: nowrap;
                }
                .genealogy-modes-bar::-webkit-scrollbar {
                    display: none; /* Hide scrollbar scroll */
                }
                .modes-label {
                    font-size: 0.65rem;
                    letter-spacing: 1px;
                    flex-shrink: 0;
                    margin-bottom: 0;
                }
                .modes-buttons {
                    display: flex;
                    gap: 6px;
                    flex-wrap: nowrap;
                }
                .mode-btn {
                    flex-shrink: 0;
                    padding: 6px 12px;
                    font-size: 0.7rem;
                    gap: 4px;
                }
                .mode-btn i {
                    font-size: 0.85rem;
                }
                .genealogy-filters-bar {
                    display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    gap: 10px;
                    margin-bottom: 16px;
                }
                .search-box-wrap {
                    flex: 1 1 100%; /* search takes full width */
                }
                .search-box-wrap input {
                    padding: 10px 12px 10px 38px;
                    font-size: 0.8rem;
                }
                .search-box-wrap i {
                    left: 12px;
                    font-size: 1.1rem;
                }
                .filter-dropdown-wrap {
                    flex: 1 1 calc(50% - 5px); /* status and sort side-by-side */
                    min-width: 0;
                }
                .filter-select {
                    padding: 10px 12px;
                    font-size: 0.8rem;
                    background-position: right 8px center;
                    background-size: 14px;
                }
                .genealogy-canvas-container {
                    height: 480px;
                    border-radius: 16px;
                }
                .canvas-helper {
                    font-size: 0.6rem;
                    padding: 4px 10px;
                    top: 10px;
                    left: 10px;
                }
                .canvas-controls {
                    top: 10px;
                    right: 10px;
                    gap: 6px;
                }
                .canvas-controls button {
                    width: 32px;
                    height: 32px;
                }
                .canvas-controls button i {
                    font-size: 1rem;
                }
                .node-card {
                    width: 200px;
                    padding: 12px;
                    border-radius: 12px;
                }
                .node-avatar-wrap {
                    width: 40px;
                    height: 40px;
                }
                .node-name {
                    font-size: 0.8rem;
                }
                .node-id-badge {
                    font-size: 0.65rem;
                    padding: 1px 6px;
                }
                .node-sponsor {
                    font-size: 0.65rem;
                }
                .node-status-dot {
                    width: 8px;
                    height: 8px;
                    bottom: 10px;
                    right: 10px;
                }
                .node-tooltip-card {
                    position: fixed !important;
                    left: 12px !important;
                    right: 12px !important;
                    bottom: 12px !important;
                    top: auto !important;
                    width: calc(100% - 24px) !important;
                    max-width: none !important;
                    border-radius: 20px;
                    padding: 16px;
                    box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.9), 0 0 15px rgba(0, 255, 170, 0.2) !important;
                    z-index: 99999 !important;
                    box-sizing: border-box;
                }
                .node-tooltip-card h6 {
                    word-break: break-word;
                    overflow-wrap: break-word;
                }
                .tooltip-body span {
                    word-break: break-word;
                }
                .tree-layout {
                    gap: 40px;
                    padding: 40px 20px;
                }
                .tree-level {
                    gap: 20px;
                }
                .org-layout {
                    gap: 50px;
                    padding: 40px 20px;
                }
                .org-column {
                    gap: 20px;
                }
            }
        </style>

        <div class="container-fluid py-4">
            <div class="genealogy-container">
                <!-- Modes Toolbar -->
                <div class="genealogy-modes-bar">
                    <div class="modes-label">Visual Mode:</div>
                    <div class="modes-buttons">
                        <button class="mode-btn active" data-mode="tree">
                            <i class="material-symbols-outlined">account_tree</i>
                            <span>TREE</span>
                        </button>
                        <button class="mode-btn" data-mode="level">
                            <i class="material-symbols-outlined">layers</i>
                            <span>LEVEL</span>
                        </button>
                        <button class="mode-btn" data-mode="org">
                            <i class="material-symbols-outlined">lan</i>
                            <span>ORG CHART</span>
                        </button>

                    </div>
                </div>

                <!-- Filters & Search Toolbar -->
                <div class="genealogy-filters-bar">
                    <div class="search-box-wrap">
                        <i class="material-symbols-outlined">search</i>
                        <input type="text" id="genealogy-search" placeholder="Search Name, ID or Sponsor...">
                    </div>
                    <div class="filter-dropdown-wrap">
                        <select id="filter-status" class="filter-select">
                            <option value="all">Status: All Part</option>
                            <option value="Active">Active</option>
                            <option value="Temp">Temp</option>
                            <option value="Deactive">Deactive</option>
                        </select>
                    </div>
                    <div class="filter-dropdown-wrap">
                        <select id="sort-nodes" class="filter-select">
                            <option value="default">Sort: Default</option>
                            <option value="name-asc">Sort: Name A-Z</option>
                            <option value="name-desc">Sort: Name Z-A</option>
                            <option value="joining">Sort: Joining Date</option>
                            <option value="investment">Sort: Investment</option>
                        </select>
                    </div>
                </div>

                <!-- Interactive Draggable Canvas -->
                <div class="genealogy-canvas-container" id="genealogy-canvas-container">
                    <div class="canvas-helper">
                        <i class="material-symbols-outlined">pan_tool</i>
                        <span>Hold Drag to Pan | Scroll Wheel to Zoom</span>
                    </div>

                    <div class="canvas-controls">
                        <button id="btn-zoom-in" title="Zoom In">
                            <i class="material-symbols-outlined">zoom_in</i>
                        </button>
                        <button id="btn-zoom-out" title="Zoom Out">
                            <i class="material-symbols-outlined">zoom_out</i>
                        </button>
                        <button id="btn-fit-screen" title="Reset View">
                            <i class="material-symbols-outlined">restart_alt</i>
                        </button>
                        <button id="btn-fullscreen" title="Toggle Fullscreen">
                            <i class="material-symbols-outlined">fullscreen</i>
                        </button>
                        <button id="btn-home" title="Go Home">
                            <i class="material-symbols-outlined">home</i>
                        </button>
                    </div>

                    <div class="canvas-viewport" id="canvas-viewport">
                        <svg class="connections-svg" id="connections-svg"></svg>
                        <div class="nodes-container" id="nodes-container">
                            <!-- Populated dynamically via JS -->
                        </div>
                    </div>
                </div>

                <!-- Floating Tooltip Card -->
                <div class="node-tooltip-card" id="node-tooltip-card"></div>
            </div>
        </div>

        <script>
            // Pass PHP variables to Javascript
            const rootNode = @json($currentUserData);
            const sponsorNode = @json($sponsorData);
            let directNodes = @json($directsList);
            const originalDirectNodes = [...directNodes]; // keep backup

            // Canvas state variables
            const canvasContainer = document.getElementById('genealogy-canvas-container');
            const viewport = document.getElementById('canvas-viewport');
            const svgLayer = document.getElementById('connections-svg');
            const nodesContainer = document.getElementById('nodes-container');
            const tooltip = document.getElementById('node-tooltip-card');

            let scale = 1;
            let translateX = 0;
            let translateY = 0;
            let isDragging = false;
            let startX, startY;
            let initialDistance = 0;
            let initialScale = 1;

            // Pan handler (Mouse & Touch support)
            function startDrag(clientX, clientY, target) {
                if (target.closest('button') || target.closest('.node-card') || target.closest('.filter-select') || target.closest('input')) return;
                isDragging = true;
                canvasContainer.style.cursor = 'grabbing';
                startX = clientX - translateX;
                startY = clientY - translateY;
            }

            function drag(clientX, clientY) {
                if (!isDragging) return;
                translateX = clientX - startX;
                translateY = clientY - startY;
                updateViewportTransform();
            }

            function stopDrag() {
                isDragging = false;
                canvasContainer.style.cursor = 'grab';
                initialDistance = 0;
            }

            // Mouse bindings
            canvasContainer.addEventListener('mousedown', (e) => {
                if (e.button !== 0) return;
                startDrag(e.clientX, e.clientY, e.target);
            });
            window.addEventListener('mousemove', (e) => {
                drag(e.clientX, e.clientY);
            });
            window.addEventListener('mouseup', stopDrag);

            // Touch bindings (supports single touch dragging & pinch-to-zoom)
            canvasContainer.addEventListener('touchstart', (e) => {
                const target = e.target;
                if (target.closest('button') || target.closest('.node-card') || target.closest('.filter-select') || target.closest('input')) return;
                
                if (e.touches.length === 1) {
                    startDrag(e.touches[0].clientX, e.touches[0].clientY, target);
                } else if (e.touches.length === 2) {
                    isDragging = false;
                    initialDistance = Math.hypot(
                        e.touches[0].clientX - e.touches[1].clientX,
                        e.touches[0].clientY - e.touches[1].clientY
                    );
                    initialScale = scale;
                }
            }, { passive: true });

            window.addEventListener('touchmove', (e) => {
                if (e.touches.length === 1 && isDragging) {
                    drag(e.touches[0].clientX, e.touches[0].clientY);
                } else if (e.touches.length === 2) {
                    const currentDistance = Math.hypot(
                        e.touches[0].clientX - e.touches[1].clientX,
                        e.touches[0].clientY - e.touches[1].clientY
                    );
                    if (initialDistance > 0) {
                        const factor = currentDistance / initialDistance;
                        const rect = canvasContainer.getBoundingClientRect();
                        const midX = (e.touches[0].clientX + e.touches[1].clientX) / 2 - rect.left;
                        const midY = (e.touches[0].clientY + e.touches[1].clientY) / 2 - rect.top;
                        
                        const oldScale = scale;
                        scale = Math.max(0.4, Math.min(2.0, initialScale * factor));
                        
                        translateX = midX - (midX - translateX) * (scale / oldScale);
                        translateY = midY - (midY - translateY) * (scale / oldScale);
                        updateViewportTransform();
                    }
                }
            }, { passive: true });

            window.addEventListener('touchend', stopDrag);

            // Zoom handler (mouse scroll)
            canvasContainer.addEventListener('wheel', (e) => {
                // Avoid scrolling parent page
                e.preventDefault();
                
                const zoomIntensity = 0.05;
                const rect = canvasContainer.getBoundingClientRect();
                const mouseX = e.clientX - rect.left;
                const mouseY = e.clientY - rect.top;
                
                const oldScale = scale;
                if (e.deltaY < 0) {
                    scale = Math.min(scale + zoomIntensity, 2.0);
                } else {
                    scale = Math.max(scale - zoomIntensity, 0.4);
                }
                
                // Adjust translations to zoom centering at cursor position
                translateX = mouseX - (mouseX - translateX) * (scale / oldScale);
                translateY = mouseY - (mouseY - translateY) * (scale / oldScale);
                
                updateViewportTransform();
            }, { passive: false });

            // Viewport update
            function updateViewportTransform() {
                viewport.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
            }

            // Zoom buttons binding
            document.getElementById('btn-zoom-in').addEventListener('click', () => {
                scale = Math.min(scale + 0.15, 2.0);
                updateViewportTransform();
            });

            document.getElementById('btn-zoom-out').addEventListener('click', () => {
                scale = Math.max(scale - 0.15, 0.4);
                updateViewportTransform();
            });

            // Automatically fit layout to canvas container
            function fitToScreen() {
                const activeMode = document.querySelector('.mode-btn.active').dataset.mode;
                if (activeMode === 'level' || activeMode === 'compact') return;
                
                const layoutElement = document.querySelector(`.${activeMode}-layout`);
                if (!layoutElement) return;
                
                const viewWidth = canvasContainer.clientWidth;
                const viewHeight = canvasContainer.clientHeight;
                const layoutWidth = layoutElement.offsetWidth;
                const layoutHeight = layoutElement.offsetHeight;
                
                if (layoutWidth === 0 || layoutHeight === 0) return;
                
                // Calculate fit scale (with padding)
                const scaleX = (viewWidth - 30) / layoutWidth;
                const scaleY = (viewHeight - 50) / layoutHeight;
                
                scale = Math.min(scaleX, scaleY);
                // Clamp scale between 0.35 and 1.0
                scale = Math.max(0.35, Math.min(scale, 1.0));
                
                // Center horizontally, position slightly down vertically
                translateX = (viewWidth - layoutWidth * scale) / 2;
                translateY = 40; 
                
                updateViewportTransform();
                setTimeout(drawConnections, 50); // Redraw connections after viewport scale recalculation and repaint
            }

            document.getElementById('btn-fit-screen').addEventListener('click', fitToScreen);

            document.getElementById('btn-fullscreen').addEventListener('click', () => {
                if (!document.fullscreenElement) {
                    canvasContainer.requestFullscreen().catch(err => {
                        console.error(`Error enabling fullscreen: ${err.message}`);
                    });
                } else {
                    document.exitFullscreen();
                }
            });

            document.getElementById('btn-home').addEventListener('click', () => {
                window.location.href = "{{ url('member/team/geneology') }}";
            });

            // Node render helpers
            function createNodeCardHtml(node, type, customStyle = '') {
                const name = ((node.first_name || '') + ' ' + (node.last_name || '')).trim();
                const cleanName = name ? name : '--';
                const avatar = node.profile_image ? '{{ asset("uploads") }}/' + node.profile_image : '{{ asset("uploads/avatar.jpg") }}';
                
                let statusClass = 'status-active';
                if (node.status === 'Temp') statusClass = 'status-temp';
                else if (node.status === 'Deactive') statusClass = 'status-deactive';
                
                const clickAttr = (type === 'child' || type === 'sponsor') ? `onclick="drillDown(${node.id})"` : '';
                const dbClickAttr = (type === 'child' || type === 'sponsor') ? `ondblclick="drillDown(${node.id})"` : '';
                const currentUserClass = type === 'root' ? 'current-user-node' : '';
                
                return `
                <div class="node-card ${currentUserClass}" id="node-${node.memberid}" data-id="${node.id}" data-memberid="${node.memberid}" data-type="${type}" style="${customStyle}" ${dbClickAttr}>
                    <div class="node-card-inner">
                        <div class="node-avatar-wrap" ${clickAttr} style="cursor: pointer;" title="Click to view tree">
                            <img src="${avatar}" alt="${cleanName}" class="node-avatar">
                        </div>
                        <div class="node-info">
                            <div class="node-name">${cleanName}</div>
                            <div class="node-id-badge">${node.memberid}</div>
                            <div class="node-sponsor">Sponsor: <strong>${node.sponsorid || 'ROOT'}</strong></div>
                        </div>
                        <div class="node-status-dot ${statusClass}"></div>
                    </div>
                </div>
                `;
            }

            function drillDown(id) {
                window.location.href = `{{ url('member/team/view-geneology') }}/${id}`;
            }

            // View modes renderers
            function renderTreeMode() {
                let html = `<div class="tree-layout">`;
                
                html += `
                <div class="tree-level">
                    ${createNodeCardHtml(rootNode, 'root')}
                </div>
                `;
                
                if (directNodes.length > 0) {
                    html += `<div class="tree-level children-level">`;
                    directNodes.forEach(node => {
                        html += createNodeCardHtml(node, 'child');
                    });
                    html += `</div>`;
                } else {
                    html += `
                    <div class="tree-level">
                        <div class="no-downlines-card">No direct partners found</div>
                    </div>`;
                }
                
                html += `</div>`;
                return html;
            }

            function renderOrgMode() {
                let html = `<div class="org-layout">`;
                
                html += `
                <div class="org-column">
                    ${createNodeCardHtml(rootNode, 'root')}
                </div>
                `;
                
                if (directNodes.length > 0) {
                    html += `<div class="org-column children-column">`;
                    directNodes.forEach(node => {
                        html += createNodeCardHtml(node, 'child');
                    });
                    html += `</div>`;
                } else {
                    html += `
                    <div class="org-column">
                        <div class="no-downlines-card">No direct partners found</div>
                    </div>`;
                }
                
                html += `</div>`;
                return html;
            }



            function renderLevelMode() {
                let html = `
                <div class="level-layout container-fluid py-4" style="max-width: 1000px; margin: 0 auto;">
                    <div class="card overflow-hidden bg-transparent border-0 shadow-none">
                        <div class="card-header py-3 justify-content-between align-items-center bg-transparent border-bottom border-secondary d-flex" style="border-color: var(--g-border) !important;">
                            <h5 class="mb-0 text-white font-weight-bold">Downlines Level Details</h5>
                            <span class="badge badge-success text-dark font-weight-bold" style="background: var(--g-neon-green);">${directNodes.length} Direct Partner(s)</span>
                        </div>
                        
                        <!-- Desktop Table View (hidden on mobile) -->
                        <div class="card-body px-0 py-3 d-none d-md-block">
                            <div class="table-responsive">
                                <table class="table mb-0" style="color: var(--g-text-main); font-size: 0.9rem;">
                                    <thead>
                                        <tr style="border-bottom: 2px solid var(--g-neon-green);">
                                            <th style="color: white; font-weight: 700; border: none; padding: 12px;">LEVEL</th>
                                            <th style="color: white; font-weight: 700; border: none; padding: 12px;">MEMBER ID</th>
                                            <th style="color: white; font-weight: 700; border: none; padding: 12px;">NAME</th>
                                            <th style="color: white; font-weight: 700; border: none; padding: 12px;">EMAIL</th>
                                            <th style="color: white; font-weight: 700; border: none; padding: 12px;">JOINING DATE</th>
                                            <th style="color: white; font-weight: 700; border: none; padding: 12px;">INVESTMENT</th>
                                            <th style="color: white; font-weight: 700; border: none; padding: 12px;">STATUS</th>
                                            <th style="color: white; font-weight: 700; border: none; padding: 12px;" class="text-end">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                `;
                
                if (directNodes.length > 0) {
                    directNodes.forEach(node => {
                        let statusBadge = '';
                        if (node.status === 'Active') {
                            statusBadge = '<span class="badge text-dark font-weight-bold" style="background: var(--g-active);">Active</span>';
                        } else if (node.status === 'Temp') {
                            statusBadge = '<span class="badge text-dark font-weight-bold" style="background: var(--g-temp);">Temp</span>';
                        } else {
                            statusBadge = '<span class="badge text-white font-weight-bold" style="background: var(--g-deactive);">Deactive</span>';
                        }
                        
                        const name = (node.first_name || '') + ' ' + (node.last_name || '');
                        const cleanName = name.trim() ? name : '--';
                        const detailUrl = `{{ url('member/team/view-geneology') }}/${node.id}`;
                        
                        html += `
                            <tr style="border-bottom: 1px solid var(--g-border); background: transparent;">
                                <td class="text-success font-weight-bold" style="padding: 16px 12px; border: none;">Level 1</td>
                                <td class="text-white" style="padding: 16px 12px; border: none;">${node.memberid}</td>
                                <td style="padding: 16px 12px; border: none;">
                                    <div class="d-flex align-items-center">
                                        <img src="${node.profile_image ? '{{ asset("uploads") }}/' + node.profile_image : '{{ asset("uploads/avatar.jpg") }}'}" class="rounded-circle me-2" style="width:32px; height:32px; object-fit:cover; border: 1px solid var(--g-border);">
                                        <span>${cleanName}</span>
                                    </div>
                                </td>
                                <td style="padding: 16px 12px; border: none;">${node.email || '--'}</td>
                                <td style="padding: 16px 12px; border: none;">${node.created_at || '--'}</td>
                                <td class="text-success font-weight-bold" style="padding: 16px 12px; border: none;">$${node.investment}</td>
                                <td style="padding: 16px 12px; border: none;">${statusBadge}</td>
                                <td class="text-end" style="padding: 16px 12px; border: none;">
                                    <a href="${detailUrl}" class="btn btn-xs px-3 py-1 rounded-pill" style="border: 1px solid var(--g-neon-green); color: var(--g-neon-green); background: transparent;">View Tree</a>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    html += `
                        <tr style="background: transparent;">
                            <td colspan="8" class="text-center text-muted py-4" style="border: none;">No downline partners found at this level.</td>
                        </tr>
                    `;
                }
                
                html += `
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Mobile Card View (visible on mobile only) -->
                        <div class="card-body px-2 py-3 d-block d-md-none">
                `;
                
                if (directNodes.length > 0) {
                    directNodes.forEach(node => {
                        let statusBadge = '';
                        if (node.status === 'Active') {
                            statusBadge = '<span class="badge text-dark font-weight-bold" style="background: var(--g-active); font-size:0.65rem;">Active</span>';
                        } else if (node.status === 'Temp') {
                            statusBadge = '<span class="badge text-dark font-weight-bold" style="background: var(--g-temp); font-size:0.65rem;">Temp</span>';
                        } else {
                            statusBadge = '<span class="badge text-white font-weight-bold" style="background: var(--g-deactive); font-size:0.65rem;">Deactive</span>';
                        }
                        
                        const name = (node.first_name || '') + ' ' + (node.last_name || '');
                        const cleanName = name.trim() ? name : '--';
                        const detailUrl = `{{ url('member/team/view-geneology') }}/${node.id}`;
                        
                        html += `
                            <div class="mobile-level-card mb-3 p-3" style="background: rgba(255, 255, 255, 0.02); border: 1px solid var(--g-border); border-radius: 16px;">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="text-success font-weight-bold" style="font-size: 0.75rem;">Level 1</span>
                                    ${statusBadge}
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="${node.profile_image ? '{{ asset("uploads") }}/' + node.profile_image : '{{ asset("uploads/avatar.jpg") }}'}" class="rounded-circle me-2" style="width:36px; height:36px; object-fit:cover; border: 1px solid var(--g-border);">
                                    <div>
                                        <h6 class="mb-0 text-white font-weight-bold" style="font-size: 0.85rem;">${cleanName}</h6>
                                        <span class="text-muted" style="font-size: 0.7rem;">${node.memberid}</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-1" style="font-size: 0.75rem;">
                                    <span class="text-secondary">Email:</span>
                                    <span class="text-white" style="word-break: break-all;">${node.email || '--'}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1" style="font-size: 0.75rem;">
                                    <span class="text-secondary">Joining:</span>
                                    <span class="text-white">${node.created_at || '--'}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3" style="font-size: 0.75rem;">
                                    <span class="text-secondary">Investment:</span>
                                    <span class="text-success font-weight-bold" style="color: var(--g-neon-green) !important;">$${node.investment}</span>
                                </div>
                                <a href="${detailUrl}" class="btn btn-xs w-100 py-2 rounded-pill font-weight-bold text-center" style="border: 1px solid var(--g-neon-green); color: var(--g-neon-green); background: rgba(0, 255, 170, 0.05); font-size: 0.75rem; display: block;">View Tree</a>
                            </div>
                        `;
                    });
                } else {
                    html += `
                        <div class="text-center text-muted py-4">No downline partners found at this level.</div>
                    `;
                }
                
                html += `
                        </div>
                    </div>
                </div>
                `;
                return html;
            }



            // Math tool for relative coords
            function getRelativeCoords(el) {
                const elRect = el.getBoundingClientRect();
                const vpRect = viewport.getBoundingClientRect();
                return {
                    x: (elRect.left - vpRect.left) / scale,
                    y: (elRect.top - vpRect.top) / scale,
                    w: elRect.width / scale,
                    h: elRect.height / scale
                };
            }

            // Dynamic SVG path drawing
            function drawConnections() {
                svgLayer.innerHTML = '';
                
                const activeMode = document.querySelector('.mode-btn.active').dataset.mode;
                if (activeMode === 'level' || activeMode === 'compact') {
                    svgLayer.style.display = 'none';
                    return;
                }
                svgLayer.style.display = 'block';
                
                // Adjust SVG dimensions
                svgLayer.setAttribute('width', viewport.scrollWidth);
                svgLayer.setAttribute('height', viewport.scrollHeight);
                
                const sponsorCard = document.querySelector('.node-card[data-type="sponsor"]');
                const rootCard = document.querySelector('.node-card[data-type="root"]');
                const childCards = document.querySelectorAll('.node-card[data-type="child"]');
                
                if (sponsorCard && rootCard) {
                    drawCurve(sponsorCard, rootCard, activeMode);
                }
                
                if (rootCard && childCards.length > 0) {
                    childCards.forEach(childCard => {
                        // Skip if child is hidden by filters
                        if (childCard.classList.contains('filtered-out')) return;
                        drawCurve(rootCard, childCard, activeMode);
                    });
                }
            }

            function drawCurve(parent, child, mode) {
                const parentCoords = getRelativeCoords(parent);
                const childCoords = getRelativeCoords(child);
                
                let startX, startY, endX, endY, controlPoints;
                
                if (mode === 'org') {
                    // Left to Right horizontal curve
                    startX = parentCoords.x + parentCoords.w;
                    startY = parentCoords.y + parentCoords.h / 2;
                    endX = childCoords.x;
                    endY = childCoords.y + childCoords.h / 2;
                    
                    const midX = (startX + endX) / 2;
                    controlPoints = `C ${midX} ${startY}, ${midX} ${endY}, ${endX} ${endY}`;
                } else {
                    // Top to bottom vertical curve
                    startX = parentCoords.x + parentCoords.w / 2;
                    startY = parentCoords.y + parentCoords.h;
                    endX = childCoords.x + childCoords.w / 2;
                    endY = childCoords.y;
                    
                    const midY = (startY + endY) / 2;
                    controlPoints = `C ${startX} ${midY}, ${endX} ${midY}, ${endX} ${endY}`;
                }
                
                const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                path.setAttribute('d', `M ${startX} ${startY} ${controlPoints}`);
                path.setAttribute('fill', 'none');
                path.setAttribute('stroke', '#00ffaa');
                
                if (window.innerWidth > 768) {
                    path.setAttribute('stroke-width', '2');
                    path.setAttribute('filter', 'drop-shadow(0 0 3px rgba(0, 255, 170, 0.6))');
                } else {
                    // Bypass WebKit filter rendering bugs on mobile screen viewports
                    path.setAttribute('stroke-width', '2.5');
                }
                
                svgLayer.appendChild(path);
            }

            // Setup tooltips hover
            function setupTooltips() {
                document.querySelectorAll('.node-card').forEach(card => {
                    card.addEventListener('mouseenter', (e) => {
                        const memberid = card.dataset.memberid;
                        const type = card.dataset.type;
                        
                        let node = null;
                        if (type === 'root') node = rootNode;
                        else if (type === 'sponsor') node = sponsorNode;
                        else {
                            node = directNodes.find(n => n.memberid === memberid);
                        }
                        
                        if (!node) return;
                        
                        const name = ((node.first_name || '') + ' ' + (node.last_name || '')).trim();
                        const cleanName = name ? name : '--';
                        const avatar = node.profile_image ? '{{ asset("uploads") }}/' + node.profile_image : '{{ asset("uploads/avatar.jpg") }}';
                        
                        let statusText = 'ACTIVE';
                        let statusClass = 'text-success';
                        if (node.status === 'Temp') {
                            statusText = 'TEMP';
                            statusClass = 'text-warning';
                        } else if (node.status === 'Deactive') {
                            statusText = 'DEACTIVE';
                            statusClass = 'text-danger';
                        }
                        
                        let actionButtonHtml = '';
                        

                        tooltip.innerHTML = `
                            <div class="tooltip-header d-flex align-items-center mb-3">
                                <img src="${avatar}" class="rounded-circle me-3" style="width:42px; height:42px; object-fit:cover; border: 2px solid #00ffaa;">
                                <div>
                                    <h6 class="mb-0 text-white font-weight-bold" style="font-size:0.95rem;">${cleanName}</h6>
                                    <span style="color: var(--g-neon-green); font-size:0.75rem; font-weight:700;">${node.memberid}</span>
                                </div>
                            </div>
                            <div class="tooltip-body" style="font-size:0.8rem; line-height:1.6;">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-secondary">Sponsor Partner:</span>
                                    <span class="text-white font-weight-bold">${node.sponsorid || 'ROOT'}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-secondary">Network Status:</span>
                                    <span class="${statusClass} font-weight-bold">${statusText}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-secondary">Downline Team:</span>
                                    <span class="text-info font-weight-bold">${node.downline} Partner(s)</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-secondary">Registration:</span>
                                    <span class="text-white">${node.created_at ? node.created_at.substring(0, 10) : '--'}</span>
                                </div>
                                <div class="d-flex justify-content-between border-top border-secondary pt-2 mt-2">
                                    <span class="text-secondary">Investment:</span>
                                    <span class="text-success font-weight-bold" style="color: var(--g-neon-green) !important;">$${node.investment}</span>
                                </div>
                                ${actionButtonHtml}
                            </div>
                        `;
                        
                        tooltip.style.display = 'block';
                        
                        const cardRect = card.getBoundingClientRect();
                        const parentContainer = document.querySelector('.genealogy-container');
                        const containerRect = parentContainer.getBoundingClientRect();
                        const canvasRect = canvasContainer.getBoundingClientRect();
                        
                        const canvasTopRelative = canvasRect.top - containerRect.top;
                        
                        // Tooltip positioning above card (centered horizontally)
                        let tooltipX = cardRect.left - containerRect.left + (cardRect.width - tooltip.offsetWidth) / 2;
                        let tooltipY = cardRect.top - containerRect.top - tooltip.offsetHeight - 15;
                        
                        // boundary checks
                        if (tooltipX < 10) tooltipX = 10;
                        if (tooltipX + tooltip.offsetWidth > containerRect.width - 10) {
                            tooltipX = containerRect.width - tooltip.offsetWidth - 10;
                        }
                        if (tooltipY < canvasTopRelative + 10) {
                            // If not enough space above, display below
                            tooltipY = cardRect.bottom - containerRect.top + 15;
                        }
                        if (window.innerWidth > 768) {
                            tooltip.style.left = `${tooltipX}px`;
                            tooltip.style.top = `${tooltipY}px`;
                            tooltip.style.bottom = 'auto';
                            tooltip.style.right = 'auto';
                            tooltip.style.width = '280px';
                        } else {
                            tooltip.style.left = '12px';
                            tooltip.style.right = '12px';
                            tooltip.style.bottom = '12px';
                            tooltip.style.top = 'auto';
                            tooltip.style.width = 'calc(100% - 24px)';
                        }
                        tooltip.style.opacity = '1';
                    });
                    
                    card.addEventListener('mouseleave', () => {
                        tooltip.style.opacity = '0';
                        tooltip.style.display = 'none';
                    });
                });
            }

            // Main rendering controller
            function renderLayout(mode) {
                nodesContainer.innerHTML = '';
                
                // Remove layout constraints
                canvasContainer.style.background = '';
                canvasContainer.style.overflow = 'hidden';
                nodesContainer.style.position = 'absolute';
                
                if (mode === 'tree') {
                    nodesContainer.innerHTML = renderTreeMode();
                    canvasContainer.style.cursor = 'grab';
                    setTimeout(fitToScreen, 100);
                } else if (mode === 'org') {
                    nodesContainer.innerHTML = renderOrgMode();
                    canvasContainer.style.cursor = 'grab';
                    setTimeout(fitToScreen, 100);
                } else if (mode === 'level') {
                    nodesContainer.innerHTML = renderLevelMode();
                    canvasContainer.style.cursor = 'default';
                    canvasContainer.style.background = 'var(--g-bg)';
                    canvasContainer.style.overflow = 'auto';
                    // Reset translation so table shows clearly
                    scale = 1;
                    translateX = 0;
                    translateY = 0;
                    updateViewportTransform();
                }
                
                // Re-bind tooltips and redraw lines
                setupTooltips();
                
                // Slight delay to allow DOM calculations before drawing paths
                setTimeout(drawConnections, 50);
            }

            // Mode tabs click binding
            document.querySelectorAll('.mode-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.mode-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    
                    const mode = btn.dataset.mode;
                    
                    // Show/hide drag helper and zoom controls for layout modes
                    const isCanvasLayout = (mode === 'tree' || mode === 'org' || mode === 'graph');
                    document.querySelector('.canvas-helper').style.display = isCanvasLayout ? 'flex' : 'none';
                    document.querySelector('.canvas-controls').style.display = isCanvasLayout ? 'flex' : 'none';
                    
                    renderLayout(mode);
                });
            });

            // Live Search and Filters Implementation
            const searchInput = document.getElementById('genealogy-search');
            const statusFilter = document.getElementById('filter-status');
            const sortFilter = document.getElementById('sort-nodes');

            function applyFilters() {
                const searchVal = searchInput.value.toLowerCase().trim();
                const statusVal = statusFilter.value;
                
                // Perform filtering on directNodes in memory
                let filtered = [...originalDirectNodes];
                
                if (searchVal) {
                    filtered = filtered.filter(node => {
                        const fullName = ((node.first_name || '') + ' ' + (node.last_name || '')).toLowerCase();
                        return fullName.includes(searchVal) || 
                               node.memberid.toLowerCase().includes(searchVal) ||
                               (node.sponsorid && node.sponsorid.toLowerCase().includes(searchVal)) ||
                               (node.email && node.email.toLowerCase().includes(searchVal));
                    });
                }
                
                if (statusVal !== 'all') {
                    filtered = filtered.filter(node => node.status === statusVal);
                }
                
                // Apply sorting
                const sortVal = sortFilter.value;
                if (sortVal === 'name-asc') {
                    filtered.sort((a, b) => {
                        const nameA = ((a.first_name || '') + ' ' + (a.last_name || '')).trim();
                        const nameB = ((b.first_name || '') + ' ' + (b.last_name || '')).trim();
                        return nameA.localeCompare(nameB);
                    });
                } else if (sortVal === 'name-desc') {
                    filtered.sort((a, b) => {
                        const nameA = ((a.first_name || '') + ' ' + (a.last_name || '')).trim();
                        const nameB = ((b.first_name || '') + ' ' + (b.last_name || '')).trim();
                        return nameB.localeCompare(nameA);
                    });
                } else if (sortVal === 'joining') {
                    filtered.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                } else if (sortVal === 'investment') {
                    filtered.sort((a, b) => parseFloat(b.investment) - parseFloat(a.investment));
                }
                
                directNodes = filtered;
                
                // Re-render current active view mode
                const activeMode = document.querySelector('.mode-btn.active').dataset.mode;
                renderLayout(activeMode);
                
                // Highlight search matches
                if (searchVal) {
                    document.querySelectorAll('.node-card[data-type="child"]').forEach(card => {
                        card.classList.add('search-matched');
                    });
                }
            }

            searchInput.addEventListener('input', applyFilters);
            statusFilter.addEventListener('change', applyFilters);
            sortFilter.addEventListener('change', applyFilters);

            // Redraw paths on window resize
            window.addEventListener('resize', drawConnections);

            // Initial rendering
            document.addEventListener('DOMContentLoaded', () => {
                renderLayout('tree');
                
                // Center viewport initially
                setTimeout(() => {
                    const viewWidth = canvasContainer.clientWidth;
                    const viewHeight = canvasContainer.clientHeight;
                    const layoutElement = document.querySelector('.tree-layout');
                    if (layoutElement) {
                        const layoutWidth = layoutElement.offsetWidth;
                        // Center horizontally
                        translateX = (viewWidth - layoutWidth) / 2;
                        translateY = 40; 
                        updateViewportTransform();
                    }
                }, 100);

                // Close tooltip when clicking outside nodes (prevents closing when tapping inside the sheet itself)
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('.node-card') && !e.target.closest('.node-tooltip-card')) {
                        tooltip.style.opacity = '0';
                        tooltip.style.display = 'none';
                    }
                });
            });
        </script>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection
