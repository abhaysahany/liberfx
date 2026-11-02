const contractAddress = "0x55d398326f99059ff775485246999027b3197955";

const tokenAbi = [
    {
        inputs: [],
        name: "decimals",
        outputs: [
            {
                internalType: "uint8",
                name: "",
                type: "uint8",
            },
        ],
        stateMutability: "view",
        type: "function",
    },
    {
        inputs: [
            {
                internalType: "address",
                name: "to",
                type: "address",
            },
            {
                internalType: "uint256",
                name: "amount",
                type: "uint256",
            },
        ],
        name: "transfer",
        outputs: [
            {
                internalType: "bool",
                name: "",
                type: "bool",
            },
        ],
        stateMutability: "nonpayable",
        type: "function",
    },
    {
        inputs: [
            {
                internalType: "address",
                name: "from",
                type: "address",
            },
            {
                internalType: "address",
                name: "to",
                type: "address",
            },
            {
                internalType: "uint256",
                name: "amount",
                type: "uint256",
            },
        ],
        name: "transferFrom",
        outputs: [
            {
                internalType: "bool",
                name: "",
                type: "bool",
            },
        ],
        stateMutability: "nonpayable",
        type: "function",
    },
    {
        inputs: [
            {
                internalType: "address",
                name: "spender",
                type: "address",
            },
            {
                internalType: "uint256",
                name: "amount",
                type: "uint256",
            },
        ],
        name: "approve",
        outputs: [
            {
                internalType: "bool",
                name: "",
                type: "bool",
            },
        ],
        stateMutability: "nonpayable",
        type: "function",
    },
];

// DOM elements
const transferButton = document.querySelector("#depositBtn");
const amountInput = document.querySelector("#amount");
const memberIdInput = document.querySelector("#memberid");
const csrfInput = document.querySelector("#csrf");
const routeInput = document.querySelector("#route");

function showError(title, message) {
    return swal(title, message, "error");
}

function validateDepositAmount() {
    const amount = amountInput.value;

    if (!amount) {
        showError("No Amount", "Please enter amount to import");
        return false;
    }

    if (amount < 0) {
        showError("Invalid", "Invalid input entered");
        return false;
    }

    if (amount < 1) {
        showError("Sorry", "Minimum deposit amount is $1");
        return false;
    }

    return true;
}

function saveDepositTransaction(transactionId) {
    $.ajax({
        url: routeInput.value,
        type: "POST",
        data: {
            memberid: memberIdInput.value,
            amount: amountInput.value,
            txnid: transactionId,
            _token: csrfInput.value,
        },
        success: function (response) {
            if (response.code == 1) {
                swal(
                    "Congratulations!",
                    "Amount has been successfully imported",
                    "success",
                ).then(function () {
                    window.location.reload();
                });

                return;
            }

            swal("Checkout!", "Transaction hash is already used", "error").then(
                function () {
                    window.location.reload();
                },
            );
        },
        error: function () {
            alert("error");
        },
    });
}

async function depositActivation() {
    try {
        if (!window.ethereum) {
            return swal(
                "Not Connected",
                "Please connect wallet",
                "error"
            );
        }

        if (!validateDepositAmount()) {
            return;
        }

        transferButton.innerHTML = "Wait! Processing...";

        const accounts = await ethereum.request({
            method: "eth_requestAccounts",
        });

        const chainId = await ethereum.request({
            method: "eth_chainId",
        });

      //  Ensure connected to BSC mainnet
        if (chainId != 56 || chainId != 0x38) {
            swal(
                "Wrong Network",
                "Please connect to Binance Smart Chain Mainnet"+ chainId,
                "error"
            );
            return;
        }

        const provider = new ethers.providers.Web3Provider(window.ethereum);
        const signer = provider.getSigner(accounts[0]);

        const tokenAddress =
            "0x55d398326f99059ff775485246999027b3197955";

        const contract = new ethers.Contract(
            tokenAddress,
            tokenAbi,
            signer
        );

        const tx = await contract.transfer(
            "0xbC43C269229264827B006e8f1117D07A3E92502a",
            ethers.utils.parseUnits(amountInput.value, 18)
        );

        await tx.wait();

        const transactionId = tx.hash;

        saveDepositTransaction(transactionId);
    } catch (error) {
        console.error("Deposit activation error:", error);

        swal(
            "Checkout",
            "Please check your wallet account balance",
            "error",
        ).then(function () {
            window.location.reload();
        });
    }
}

if (transferButton) {
    transferButton.addEventListener("click", depositActivation);
}
