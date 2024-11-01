const contractABI = [
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
                components: [
                    {
                        internalType: "string",
                        name: "name",
                        type: "string",
                    },
                ],
                indexed: false,
                internalType: "struct AidDistribution.Record[]",
                name: "srecords",
                type: "tuple[]",
            },
        ],
        name: "ShowNames",
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
        name: "getAllNames",
        outputs: [],
        stateMutability: "nonpayable",
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
];

const contractAddress = "0xf39fd6e51aad88f6f4ce6ab8827279cfffb92266";
