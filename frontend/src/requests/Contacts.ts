const baseUri = "http://localhost:9000";

interface Contact {
  name: String,
  lastname: String,
  contacts: String[]
}

export const addNewContact = async (contact: Contact) => {
  const body = JSON.stringify(contact);
  const response = await fetch(`${baseUri}/persons`, {
    method: "POST",
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    body,
  });
  if (response.status !== 200) {
    throw new Error("Algum erro aconteceu");
  }
};
