<div class="menu-scroll">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">dashboard</i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/dashboard') }}">Trading Dashboard</a></li>
                    <li><a href="{{ url('/member/course-dashboard') }}">Course Dashboard</a></li>
                    <li><a href="{{ url('/member/lending-dashboard') }}">Lending Dashboard</a></li>
                </ul>
            </li>

            @php
                $token = 'EURUSD';
            @endphp
            <li><a href="{{ url('/member/exchange-type') }}" aria-expanded="false">
                    <i class="material-symbols-outlined">swap_horiz</i>
                    <span class="nav-text">Exchange</span>
                </a>
            </li>
            {{-- <li><a href="{{ url('/member/exchange') }}/{{ $token }}" aria-expanded="false">
                    <i class="material-symbols-outlined">currency_exchange</i>
                    <span class="nav-text">Trade</span>
                </a>
            </li> --}}
             <li><a href="{{ url('/member/news') }}" aria-expanded="false">
                    <i class="material-symbols-outlined">news</i>
                    <span class="nav-text">News</span>
                </a>
            </li>
            <li><a href="{{ url('/member/assets') }}" aria-expanded="false">
                    <i class="material-symbols-outlined">currency_exchange</i>
                    <span class="nav-text">Trading Pair</span>
                </a>
            </li>
            <li><a href="{{ url('/member/orders') }}" aria-expanded="false">
                    <i class="material-symbols-outlined">orders</i>
                    <span class="nav-text">User Order</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">content_copy</i>
                    <span class="nav-text">Copy Trading</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/account-details') }}">Account Details</a></li>
                    <li><a href="{{ url('/member/trading-details') }}">Trading Details</a></li>
                    <li><a href="{{ url('/member/copy-summary-details') }}">Copy Summary</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">collections_bookmark</i>
                    <span class="nav-text">Course Detail</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/voxa-course') }}">Course Buy</a></li>
                    <li><a href="{{ url('/member/course-history') }}">Course History</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">monetization_on</i>
                    <span class="nav-text">Lending Section</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/lending') }}">Lending</a></li>
                    {{-- <li><a href="{{ url('/member/member-lending') }}">Member Lending</a></li> --}}
                    <li><a href="{{ url('/member/lending-details') }}">Lending Details</a></li>
                    <li><a href="{{ url('/member/investment-break') }}">Investment Break</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">credit_card</i>
                    <span class="nav-text">Fund Wallet</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/add-funds') }}">Add Fund</a></li>
                    <li><a href="{{ url('/member/automatic-funds') }}">Automatic Fund</a></li>
                    <li><a href="{{ url('/member/fund-request') }}">Fund Request</a></li>
                    <li><a href="{{ url('/member/p2p-wallet') }}">Fund Wallet</a></li>
                    <li><a href="{{ url('/member/p2p-to-exchange') }}">Fund To Other Wallet</a></li>
                    <li><a href="{{ url('/member/p2p-history') }}">Fund Wallet History</a></li>
                </ul>
            </li>
            {{-- <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">change_circle</i>
                    <span class="nav-text">Trading Wallet</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/exc/exchange-wallet') }}">Trading Wallet</a></li>
                </ul>
            </li> --}}
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">account_balance_wallet</i>
                    <span class="nav-text">Liberfx Wallet</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/wallet') }}">Liberfx Wallets</a></li>
                    <li><a href="{{ url('/member/wallet/wallet-to-p2p') }}">Internal Transfer</a></li>
                    {{-- <li><a href="{{ url('/member/wallet/wallet-to-exchange') }}">Wallet To Trading Wallet</a></li> --}}
                    <li><a href="{{ url('/member/wallet/wallet-details') }}">Wallet Details</a></li>
                </ul>
            </li>


            {{-- <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">credit_card</i>
                    <span class="nav-text">Trade Wallet</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/trade-wallet') }}">Trade Wallet</a></li>
                    <li><a href="{{ url('/member/add-trade-funds') }}">Add Fund</a></li>
                    <li><a href="{{ url('/member/trade-fund-request') }}">Fund Request</a></li>
                    <li><a href="{{ url('/member/wallet/trade-wallet-details') }}">Wallet Details</a>
                    </li>
                </ul>
            </li> --}}
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">monetization_on</i>
                    <span class="nav-text">Incomes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('member/income/level-incomes') }}">Level Income</a></li>
                    {{-- <li><a href="{{ url('member/income/direct-incomes') }}">Direct Income</a></li> --}}
                    <!--<li><a href="{{ url('member/income/roi-incomes') }}">Trading Swap Income</a></li>-->
                    <li><a href="{{ url('member/income/reward-incomes') }}">Reward Income</a></li>
                    <li><a href="{{ url('member/income/lending-incomes') }}">Lending Income</a></li>
                    <li><a href="{{ url('member/income/light-lev-incomes') }}">Light Level Income</a>
                    </li>
                    <li><a href="{{ url('member/income/monthly-invest') }}">Team Business</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">group</i>
                    <span class="nav-text">Team Details</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/team/geneology') }}">Geneology</a></li>
                    <li><a href="{{ url('/member/direct-team') }}">Direct Team</a></li>
                    <li><a href="{{ url('/member/level-details') }}">Level Details</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">account_circle</i>
                    <span class="nav-text">Profile</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/profile') }}">Profile</a></li>
                    <li><a href="{{ url('/member/security') }}">Security</a></li>
                    <li><a href="{{ url('/member/kyc-details') }}">Kyc Details</a></li>
                    {{-- <li><a href="{{ url('/member/qr-code') }}">QR Code</a></li> --}}
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">chat</i>
                    <span class="nav-text">Support</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/member/support/create-ticket') }}">Create New Ticket</a></li>
                    <li><a href="{{ url('member/support/support-tickets') }}">Support Tickets</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('/member/logout') }}" aria-expanded="false">
                    <i class="material-symbols-outlined">logout</i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
        <div class="support-box">


        </div>

    </div>
</div>
