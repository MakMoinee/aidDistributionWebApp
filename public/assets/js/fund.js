async function receiveFund(amount, aidID, paymentAddress) {
    if (typeof window.ethereum !== "undefined") {
        // Set up the provider to connect to the local Hardhat node
        const provider = new ethers.JsonRpcProvider("http://localhost:8545");

        // Use the provider to create a signer for transaction sending
        const signer = await provider.getSigner();

        // Connect to the smart contract
        const contract = new ethers.Contract(
            contractAddress,
            contractABI,
            signer
        );

        try {
            console.log(
                `Sending funds for aidID: ${aidID}, amount: ${amount}, to receiver: ${paymentAddress}`
            );
            let finalETH = (amount / phpRate);
            finalETH = Number(finalETH.toFixed(7));
            // Convert the amount to Wei for the transaction
            const amountInWei = ethers.parseEther(`${finalETH}`);
            // const aidIDBytes32 = ethers.encodeBytes32String(aidID);
            // console.log("Encoded aidID:", aidIDBytes32);
            console.log(amountInWei);

            // Call the `receiveFunds` function in the smart contract
            const tx = await contract.receiveFunds(
                aidID,
                amountInWei,
                "d8cf7845-403b-40fb-a7cd-0bdbdda43b69",
                paymentAddress,
                { value: amountInWei } // Attach the amount as msg.value
            );

            // Wait for the transaction to be mined
            const receipt = await tx.wait();
            console.log("Funds sent successfully:", receipt);
            window.location.href = `/user_aids/${aidID}?success=true`;
        } catch (error) {
            console.error("Error sending funds:", error);
        }
    } else {
        console.error("Ethereum wallet is not connected.");
    }
}
