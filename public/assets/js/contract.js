const contractABI = [
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "aidID",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "recipient",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "amount",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "purpose",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "timestamp",
          "type": "uint256"
        }
      ],
      "name": "AidRecordAdded",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "aidID",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "address",
          "name": "sender",
          "type": "address"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "amount",
          "type": "uint256"
        }
      ],
      "name": "DonationReceived",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "aidID",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "amount",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "address",
          "name": "receiver",
          "type": "address"
        }
      ],
      "name": "FundsReceived",
      "type": "event"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "aidID",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "recipient",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "amount",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "purpose",
          "type": "string"
        }
      ],
      "name": "addAidRecord",
      "outputs": [],
      "stateMutability": "payable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "aidRecords",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "aidID",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "recipient",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "amount",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "purpose",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "timestamp",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [],
      "name": "getAidFunds",
      "outputs": [
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "aidID",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "recipient",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "amount",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "purpose",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "timestamp",
              "type": "uint256"
            }
          ],
          "internalType": "struct AidDistribution.AidRecord[]",
          "name": "",
          "type": "tuple[]"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [],
      "name": "getAllRecords",
      "outputs": [
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "aidID",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "recipient",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "amount",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "purpose",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "timestamp",
              "type": "uint256"
            }
          ],
          "internalType": "struct AidDistribution.AidRecord[]",
          "name": "",
          "type": "tuple[]"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "aidID",
          "type": "uint256"
        }
      ],
      "name": "getFundsForAidID",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "aidID",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "amount",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "uuid",
          "type": "string"
        },
        {
          "internalType": "address",
          "name": "receiver",
          "type": "address"
        }
      ],
      "name": "receiveFunds",
      "outputs": [],
      "stateMutability": "payable",
      "type": "function"
    }
  ];

const contractAddress2 = "0xf39fd6e51aad88f6f4ce6ab8827279cfffb92266";
const contractAddress = "0x5fbdb2315678afecb367f032d93f642f64180aa3";
