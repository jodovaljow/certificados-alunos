import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Router } from '@angular/router';
import { EMPTY } from 'rxjs';
import { catchError } from 'rxjs/operators';

import { environment } from 'src/environments/environment';
import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  url_login = environment.url_backend + "/login"
  loading = false

  loginForm = this.formBuilder.group({
    email: ['', Validators.required],
    password: ['', Validators.required],
  });

  constructor(
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private router: Router,
    private _snackBar: MatSnackBar
  ) { }

  ngOnInit(): void {
  }

  onSubmit() {

    this.loading = true
    this._snackBar.dismiss()

    this.authService.login({
      email: this.loginForm.get('email')?.value,
      password: this.loginForm.get('password')?.value,
    })
      .pipe(
        catchError(
          error => {

            this.loading = false
            this._snackBar.open('erro', undefined, { panelClass: 'bg-danger' })

            return EMPTY
          }
        ),
      )
      .subscribe(
        user => {

          this.loading = false
          this._snackBar.open('autenticado por ' + user.name + '!', undefined, { panelClass: 'bg-success', duration: 3000 })

          this.router.navigate(['/'])
        }
      )
  }
}
