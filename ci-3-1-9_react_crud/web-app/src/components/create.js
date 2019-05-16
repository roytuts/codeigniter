import React from 'react';
import { Link } from 'react-router-dom';

class Create extends React.Component {
  constructor(props) {
    super(props);
    this.state = {title: '', url:''};
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }
  handleChange(event) {
	  const state = this.state
	  state[event.target.name] = event.target.value
	  this.setState(state);
  }
  handleSubmit(event) {
	  event.preventDefault();
	  fetch('http://localhost/ci-3-1-9/index.php/websiterestcontroller/add_website', {
			method: 'POST',
			body: JSON.stringify({
				title: this.state.title,
				url: this.state.url
			}),
			headers: {
				"Content-type": "application/json; charset=UTF-8"
			}
		}).then(response => {
				if(response.status === 200) {
					alert("New website saved successfully");
				}
			});
  }
  render() {
    return (
		<div id="container">
		  <Link to="/">Websites</Link>
			  <p/>
			  <form onSubmit={this.handleSubmit}>
				<p>
					<label>Title:</label>
					<input type="text" name="title" value={this.state.title} onChange={this.handleChange} placeholder="Title" />
				</p>
				<p>
					<label>URL:</label>
					<input type="text" name="url" value={this.state.url} onChange={this.handleChange} placeholder="URL" />
				</p>
				<p>
					<input type="submit" value="Submit" />
				</p>
			  </form>
		   </div>
    );
  }
}

export default Create;