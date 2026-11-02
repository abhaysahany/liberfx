@extends('member.layouts.main2')
@section('title', 'Select Exchange Type')
@section('container')

    <!--**********************************Content body start***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- Header Section -->
            <div class="row g-3 mb-4">
                <div class="col-lg-12">
                    <div class="card gradient-bg">
                        <div class="card-body text-center py-5">
                            <h2 class="text-white mb-2">Choose Your Trading Market</h2>
                            <p class="text-white-50">Select between Forex or Crypto to start trading</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exchange Type Cards -->
            <div class="row g-4 justify-content-center mb-5">
                <!-- Forex Card -->
                <div class="col-lg-5 col-md-6">
                    <div class="card exchange-card forex-card h-100">
                        <div class="card-body p-4 text-center">
                            <div class="exchange-icon-wrapper mb-4">
                                <div class="exchange-icon-circle forex-icon">
                                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="card-title mb-3">Forex Trading</h3>
                            <p class="card-text text-muted mb-4">
                                Trade major, minor, and exotic currency pairs with competitive spreads and high leverage.
                            </p>
                            
                            <div class="feature-list mb-4">
                                <div class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check"></i></span>
                                    <span>EUR/USD, GBP/USD, USD/JPY</span>
                                </div>
                                <div class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check"></i></span>
                                    <span>24/5 Trading Hours</span>
                                </div>
                                <div class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check"></i></span>
                                    <span>Ultra-Low Spreads</span>
                                </div>
                                <div class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check"></i></span>
                                    <span>Up to 1:500 Leverage</span>
                                </div>
                            </div>
                            
                            <a href="{{ url('/member/exchange/forex/EURUSD') }}" class="btn btn forex-btn btn-lg w-100">
                                <span>Start Forex Trading</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Crypto Card -->
                <div class="col-lg-5 col-md-6">
                    <div class="card exchange-card crypto-card h-100">
                        <div class="card-body p-4 text-center">
                            <div class="exchange-icon-wrapper mb-4">
                                <div class="exchange-icon-circle crypto-icon">
                                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="card-title mb-3">Crypto Trading</h3>
                            <p class="card-text text-muted mb-4">
                                Trade popular cryptocurrencies against USDT with real-time prices and instant execution.
                            </p>
                            
                            <div class="feature-list mb-4">
                                <div class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-bolt"></i></span>
                                    <span>BTC, ETH, BNB, SOL</span>
                                </div>
                                <div class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-bolt"></i></span>
                                    <span>24/7 Trading</span>
                                </div>
                                <div class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-bolt"></i></span>
                                    <span>Real-Time Charts</span>
                                </div>
                                <div class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-bolt"></i></span>
                                    <span>Instant Execution</span>
                                </div>
                            </div>
                            
                            <a href="{{ url('/member/exchange/crypto/BTCUSDT') }}" class="btn btn crypto-btn btn-lg w-100">
                                <span>Start Crypto Trading</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Trading Pairs Section -->
            <div class="row g-4">
                <!-- Forex Pairs -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-transparent border-0">
                            <div class="d-flex align-items-center">
                                <div class="market-icon forex-market-icon me-3">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <h4 class="card-title mb-0 text-white">Popular Forex Pairs</h4>
                                    <span class="text-muted small">Major currency pairs</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row g-3">
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange') }}/EURUSD" class="trading-pair-card">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">EUR/USD</span>
                                                <span class="pair-label">Euro / US Dollar</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange') }}/GBPUSD" class="trading-pair-card">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">GBP/USD</span>
                                                <span class="pair-label">British Pound / USD</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange') }}/USDJPY" class="trading-pair-card">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">USD/JPY</span>
                                                <span class="pair-label">US Dollar / Yen</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange') }}/AUDUSD" class="trading-pair-card">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">AUD/USD</span>
                                                <span class="pair-label">Australian Dollar</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange') }}/USDCAD" class="trading-pair-card">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">USD/CAD</span>
                                                <span class="pair-label">US Dollar / CAD</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange') }}/USDCHF" class="trading-pair-card">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">USD/CHF</span>
                                                <span class="pair-label">US Dollar / Swiss</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Crypto Pairs -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-transparent border-0">
                            <div class="d-flex align-items-center">
                                <div class="market-icon crypto-market-icon me-3">
                                    <i class="fab fa-bitcoin"></i>
                                </div>
                                <div>
                                    <h4 class="card-title mb-0 text-warning">Popular Crypto Pairs</h4>
                                    <span class="text-muted small">Crypto / USDT trading</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row g-3">
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange/crypto') }}/BTCUSDT" class="trading-pair-card crypto-pair">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">BTC/USDT</span>
                                                <span class="pair-label">Bitcoin</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange/crypto') }}/ETHUSDT" class="trading-pair-card crypto-pair">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">ETH/USDT</span>
                                                <span class="pair-label">Ethereum</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange/crypto') }}/BNBUSDT" class="trading-pair-card crypto-pair">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">BNB/USDT</span>
                                                <span class="pair-label">Binance Coin</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange/crypto') }}/SOLUSDT" class="trading-pair-card crypto-pair">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">SOL/USDT</span>
                                                <span class="pair-label">Solana</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange/crypto') }}/XRPUSDT" class="trading-pair-card crypto-pair">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">XRP/USDT</span>
                                                <span class="pair-label">Ripple</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/member/exchange/crypto') }}/ADAUSDT" class="trading-pair-card crypto-pair">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="pair-name">ADA/USDT</span>
                                                <span class="pair-label">Cardano</span>
                                            </div>
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************Content body end***********************************-->
    <!--**********************************Footer start***********************************-->
    <div class="footer style-1">
        <div class="copyright">
            <p>Copyright © {{ config('detailsApp.name') }} <span class="current-year">2024</span></p>
        </div>
    </div>
    <!--**********************************Footer end ***********************************-->
    </div>
    <!--**********************************Main wrapper end***********************************-->

    <!--**********************************Scripts***********************************-->
    <script src="{{ asset('uassets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('uassets/js/custom.min.js') }}"></script>
    <script src="{{ asset('uassets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('uassets/js/demo.js') }}"></script>
    <script src="{{ asset('uassets/main.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Gradient Background */
        .gradient-bg {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            border: none;
        }
        
        /* Exchange Card Styles */
        .exchange-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            border-radius: 20px;
            overflow: hidden;
        }
        
        .exchange-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .forex-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
        }
        
        .forex-card:hover {
            border-color: #00d09c;
            box-shadow: 0 20px 40px rgba(0, 208, 156, 0.2);
        }
        
        .crypto-card {
            background: linear-gradient(145deg, #1a1a2e 0%, #16213e 100%);
            border-color: rgba(247, 183, 51, 0.3);
        }
        
        .crypto-card:hover {
            border-color: #f7b733;
            box-shadow: 0 20px 40px rgba(247, 183, 51, 0.25);
        }
        
        /* Icon Circle */
        .exchange-icon-wrapper {
            position: relative;
        }
        
        .exchange-icon-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .forex-icon {
            background: linear-gradient(135deg, #00d09c 0%, #00b386 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(0, 208, 156, 0.4);
        }
        
        .crypto-icon {
            background: linear-gradient(135deg, #f7b733 0%, #f39c12 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(247, 183, 51, 0.4);
        }
        
        /* Feature List */
        .feature-list {
            text-align: left;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            color: #555;
        }
        
        .feature-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 12px;
        }
        
        .forex-card .feature-icon {
            background: rgba(0, 208, 156, 0.15);
            color: #00d09c;
        }
        
        .crypto-card .feature-icon {
            background: rgba(247, 183, 51, 0.15);
            color: #f7b733;
        }
        
        /* Buttons */
        .forex-btn {
            background: linear-gradient(135deg, #00d09c 0%, #00b386 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .forex-btn:hover {
            background: linear-gradient(135deg, #00b386 0%, #009970 100%);
            transform: translateX(5px);
            color: white;
        }
        
        .crypto-btn {
            background: linear-gradient(135deg, #f7b733 0%, #f39c12 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .crypto-btn:hover {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            transform: translateX(5px);
            color: white;
        }
        
        /* Market Icon */
        .market-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .forex-market-icon {
            background: rgba(0, 208, 156, 0.15);
            color: #00d09c;
        }
        
        .crypto-market-icon {
            background: rgba(247, 183, 51, 0.15);
            color: #f7b733;
        }
        
        /* Trading Pair Card */
        .trading-pair-card {
            display: block;
            padding: 12px 16px;
            background: #f8f9fa;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .trading-pair-card:hover {
            background: #fff;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .trading-pair-card.crypto-pair {
            background: rgba(26, 26, 46, 0.5);
        }
        
        .trading-pair-card.crypto-pair:hover {
            background: rgba(26, 26, 46, 0.8);
        }
        
        .pair-name {
            display: block;
            font-weight: 600;
            color: #333;
            font-size: 15px;
        }
        
        .crypto-pair .pair-name {
            color: #f7b733;
        }
        
        .pair-label {
            display: block;
            font-size: 12px;
            color: #888;
            margin-top: 2px;
        }
        
        /* Card Title Override */
        .card-title {
            color: #333;
            font-weight: 700;
        }
        
        .crypto-card .card-title {
            color: #fff;
        }
        
        .crypto-card .card-text {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        
        .crypto-card .feature-item {
            color: rgba(255, 255, 255, 0.8);
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .exchange-icon-circle {
            animation: float 3s ease-in-out infinite;
        }
        
        .crypto-card .exchange-icon-circle {
            animation-delay: 1.5s;
        }
    </style>

    </body>

    </html>
@endsection

