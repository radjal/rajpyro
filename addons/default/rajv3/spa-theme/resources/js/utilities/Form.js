// https://laracasts.com/series/learn-vue-2-step-by-step/episodes/19

class Form {
    /**
     * Create a new Form instance.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }


    /**
     * Fetch all relevant data for the form.
     */
    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }


    /**
     * Reset the form fields.
     */
    reset() {

		//console.log('reset'); 
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }


    /**
     * Send a POST request to the given URL.
     * .
     * @param {string} url
     */
    post(url, header=null) {
		
        return this.submit('post', url, header);
    }


    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
    put(url, header=null) {
        return this.submit('put', url, header);
    }


    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
    patch(url, header=null) {
        return this.submit('patch', url, header);
    }


    /**
     * Send a DELETE request to the given URL.
     * .
     * @param {string} url
     */
    delete(url, header=null) {
        return this.submit('delete', url, header);
    }


    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
    submit(requestType, url, header) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data(), header)
                .then(response => {
                    this.onSuccess(response.data); 
                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data); 
                    reject(error.response.data);
                });
        });
    }


    /**
     * Handle a successful form submission.
     *
     * @param {object} data
     */
    onSuccess(data) {
        //alert(data.message); // temporary

        this.reset();
    }


    /**
     * Handle a failed form submission.
     *
     * @param {object} errors
     */
    onFail(errors) {
		//console.log(errors);
        this.errors.record(errors.errors); // had to double errors for it to work!
    }
}

export default Form;