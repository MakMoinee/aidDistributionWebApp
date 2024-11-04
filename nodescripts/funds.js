// node_scripts/receiveFunds.js

const { ethers } = require("ethers");

// Get parameters from command-line arguments
const aidID = process.argv[2];
const amount = process.argv[3];
const uuid = process.argv[4];
const paymentAddress = process.argv[5];

// Ensure the UUID matches the required value
const AUTH_UUID = "d8cf7845-403b-40fb-a7cd-0bdbdda43b69";

async function receiveFunds() {
    if (uuid !== AUTH_UUID) {
        throw new Error("Unauthorized: Invalid UUID");
    }

    // Connection to Hardhat's local blockchain network
    const provider = new ethers.providers.JsonRpcProvider(
        "http://127.0.0.1:8545"
    );
    const signer = provider.getSigner();

    // Replace with your deployed contract address and ABI
    const contractAddress = "0xf39fd6e51aad88f6f4ce6ab8827279cfffb92266";
    const abi = [
        {
            anonymous: false,
            inputs: [
                {
                    indexed: false,
                    internalType: "uint256",
                    name: "aidID",
                    type: "uint256",
                },
                {
                    indexed: false,
                    internalType: "string",
                    name: "recipient",
                    type: "string",
                },
                {
                    indexed: false,
                    internalType: "uint256",
                    name: "amount",
                    type: "uint256",
                },
                {
                    indexed: false,
                    internalType: "string",
                    name: "purpose",
                    type: "string",
                },
                {
                    indexed: false,
                    internalType: "uint256",
                    name: "timestamp",
                    type: "uint256",
                },
            ],
            name: "AidRecordAdded",
            type: "event",
        },
        {
            anonymous: false,
            inputs: [
                {
                    indexed: false,
                    internalType: "uint256",
                    name: "aidID",
                    type: "uint256",
                },
                {
                    indexed: false,
                    internalType: "uint256",
                    name: "amount",
                    type: "uint256",
                },
                {
                    indexed: false,
                    internalType: "address",
                    name: "receiver",
                    type: "address",
                },
            ],
            name: "FundsReceived",
            type: "event",
        },
        {
            inputs: [
                {
                    internalType: "uint256",
                    name: "aidID",
                    type: "uint256",
                },
                {
                    internalType: "string",
                    name: "recipient",
                    type: "string",
                },
                {
                    internalType: "uint256",
                    name: "amount",
                    type: "uint256",
                },
                {
                    internalType: "string",
                    name: "purpose",
                    type: "string",
                },
            ],
            name: "addAidRecord",
            outputs: [],
            stateMutability: "nonpayable",
            type: "function",
        },
        {
            inputs: [
                {
                    internalType: "uint256",
                    name: "",
                    type: "uint256",
                },
            ],
            name: "aidRecords",
            outputs: [
                {
                    internalType: "uint256",
                    name: "aidID",
                    type: "uint256",
                },
                {
                    internalType: "string",
                    name: "recipient",
                    type: "string",
                },
                {
                    internalType: "uint256",
                    name: "amount",
                    type: "uint256",
                },
                {
                    internalType: "string",
                    name: "purpose",
                    type: "string",
                },
                {
                    internalType: "uint256",
                    name: "timestamp",
                    type: "uint256",
                },
            ],
            stateMutability: "view",
            type: "function",
        },
        {
            inputs: [],
            name: "getAllRecords",
            outputs: [
                {
                    components: [
                        {
                            internalType: "uint256",
                            name: "aidID",
                            type: "uint256",
                        },
                        {
                            internalType: "string",
                            name: "recipient",
                            type: "string",
                        },
                        {
                            internalType: "uint256",
                            name: "amount",
                            type: "uint256",
                        },
                        {
                            internalType: "string",
                            name: "purpose",
                            type: "string",
                        },
                        {
                            internalType: "uint256",
                            name: "timestamp",
                            type: "uint256",
                        },
                    ],
                    internalType: "struct AidDistribution.AidRecord[]",
                    name: "",
                    type: "tuple[]",
                },
            ],
            stateMutability: "view",
            type: "function",
        },
        {
            inputs: [
                {
                    internalType: "uint256",
                    name: "aidID",
                    type: "uint256",
                },
            ],
            name: "getFundsForAidID",
            outputs: [
                {
                    internalType: "uint256",
                    name: "",
                    type: "uint256",
                },
            ],
            stateMutability: "view",
            type: "function",
        },
        {
            inputs: [
                {
                    internalType: "uint256",
                    name: "aidID",
                    type: "uint256",
                },
                {
                    internalType: "uint256",
                    name: "amount",
                    type: "uint256",
                },
                {
                    internalType: "string",
                    name: "uuid",
                    type: "string",
                },
                {
                    internalType: "address",
                    name: "receiver",
                    type: "address",
                },
            ],
            name: "receiveFunds",
            outputs: [],
            stateMutability: "payable",
            type: "function",
        },
    ];

    // Create contract instance
    const contract = new ethers.Contract(contractAddress, abi, signer);

    // Execute the receiveFunds function
    const tx = await contract.receiveFunds(aidID, amount, uuid, paymentAddress);

    // Wait for transaction to be mined
    await tx.wait();
    console.log("Funds received successfully!");
}

receiveFunds()
    .then(() => process.exit(0))
    .catch((error) => {
        console.error(error.message);
        process.exit(1);
    });
